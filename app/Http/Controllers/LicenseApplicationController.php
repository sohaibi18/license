<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicantDataEntryRequest;
use App\Http\Requests\PaymentDataEntryRequest;
use App\Models\Business;
use App\Models\BusinessType;
use App\Models\District;
use App\Models\LicenseApplication;
use App\Models\LicenseCategory;
use App\Models\Owner;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Carbon\Carbon;
use function Sodium\add;

class LicenseApplicationController extends Controller
{
    public function show($id): View
    {
        $licensecategories = LicenseCategory::all();
        $districts = District::all();
        $businesstypes = BusinessType::all();
        return view('License.show-application-form', [
            'id' => $id, 'districts' => $districts, 'businesstypes' => $businesstypes,
            'licensecategories' => $licensecategories,
        ]);
    }

    public function store($id, ApplicantDataEntryRequest $request): RedirectResponse
    {

        $path = $request->file('Profile_Image')->store('', 'public');
        $cnicpath = $request->file('CNIC_Image')->store('', 'public');

        $affidavitpath = null;
        if ($request->hasFile('Affidavit')) {
            $affidavitpath = $request->file('Affidavit')->store('', 'public');
        }

        $medcertpath = null;
        if ($request->hasFile('Medical_Certificate')) {
            $medcertpath = $request->file('Medical_Certificate')->store('', 'public');
        }

        $personaldata = Owner::create([
            'Applicant_Name' => $request->Applicant_Name,
            'Applicant_Father_Name' => $request->Applicant_Father_Name,
            'CNIC' => $request->CNIC,
            'Mobile_Number' => $request->Mobile_Number,
            'Email' => $request->has('Email') ? $request->Email : null,
            'Personal_Address' => $request->Personal_Address,
            'Gender' => $request->Gender,
            'Profile_Image' => $path,
            'CNIC_Image' => $cnicpath,
            'district_id' => $request->districts[0],

        ]);
        $ownerId = $personaldata->id;
        $user = User::find($id);
        $business = Business::create([
            'Business_Name' => $request->Business_Name,
            'Business_Address' => $request->Business_Address,
            'Contact_Number' => $request->Contact_Number,
            'Business_Email' => $request->has('Business_Email') ? $request->Business_Email : null,
            'Website' => $request->has('Website') ? $request->Website : null,
            'Start_Date' => $request->has('Start_Date') ? $request->Start_Date : null,
            'Food_Handlers' => $request->has('Food_Handlers') ? $request->Food_Handlers : null,
            'district_id' => $request->districts[0],
            'business_type_id' => $request->businesstypes[0],
            'user_id' => $user->id,
            'owner_id' => $ownerId,

        ]);
        $personaldata->businesses()->attach($business->id);
        $businessid = $business->id;

        $procLvl = $request->input('ProcLvl', 'Pending');
//
        $license = LicenseApplication::create([
            'business_id' => $businessid,
            'license_category_id' => $request->licensecategories[0],
            'ProcLvl' => $procLvl,
            'Affidavit' => $affidavitpath,
            'Medical_Certificate' => $medcertpath,
            'Expire_Date' => null,   // Assuming Expire_Date is a date
            'License_No' => null,  // Set 'License_No' to null initially
            'QRImage' => null,  // Set 'QRImage' to null initially
            'user_id' => $user->id,
            'district_id' => $request->districts[0],
            'Update_Date' => Carbon::now(),  // Assuming Update_Date is a date
            'Submit_Date' => Carbon::now(),  // Assuming Submit_Date is a date
            'Issue_Date' => null,   // Assuming Issue_Date is a date
        ]);

        $licenseid = $license->id;

        $license_category = $license->license_category;
        $licensecatfee = $license_category->License_Fee;

        $licensefeedate = $license->Submit_Date;
        $licensefeeduedate = clone $licensefeedate; // create a copy to avoid modifying the original object
        $licensefeeduedate->modify('+1 month');
        $challanNo = time() . mt_rand(1000, 9999);

        $payment = Payment::create([
            'license_application_id' => $licenseid,
            'Due_Amount' => $licensecatfee,
            'Paid_Amount' => null,
            'Due_Date' => $licensefeeduedate,
            'Deposit_Date' => null,
            'Verified_Date' => null,
            'Verify_By' => null,
            'Challan_Image' => null,
            'Challan_No' => $challanNo,
            'Remarks' => null,
            'Transaction_Id' => null,
            'Bank_Name' => null,
            'Branch_Code' => null,
        ]);
        return redirect('/dashboard')->with('success', 'License Application created successfully. ID: ' . $license->id);

    }

    public function show_applications(): View
    {
        // Get all license applications
        $licenseapplications = LicenseApplication::all();

        // Get the list of processed payment application IDs
        $processedPaymentIds = Payment::where('Due_Amount', '>', 0)
            ->where('Paid_Amount', '>', 0) // Add conditions for Paid_Amount
            ->whereNotNull('Deposit_Date')  // Add conditions for Deposit_Date
            ->whereNotNull('Challan_Image') // Add conditions for Challan_Image
            ->whereNotNull('Challan_No')     // Add conditions for Challan_No
            ->whereNotNull('Transaction_Id') // Add conditions for Transaction_Id
            ->pluck('license_application_id')
            ->toArray();


        // Filter out the processed license applications
        $filteredLicenseApplications = $licenseapplications->reject(function ($licenseapplication) use ($processedPaymentIds) {
            return in_array($licenseapplication->id, $processedPaymentIds);
        });

        return view('license.display-submitted-applications', [
            'licenseapplications' => $filteredLicenseApplications,
        ]);
    }


    public function attach_documents($id): View
    {
        $payment = Payment::where('license_application_id', $id)->first();
        $dueAmount = $payment->Due_Amount;
        $dueDate = $payment->Due_Date;
        $challanno = $payment->Challan_No;

        // Manually define enum values
        $banks = ['MCB', 'UBL', 'EasyPaisa', 'JazzCash'];


        return view('license.show-attach-document', [
            'id' => $id,
            'Due_Amount' => $dueAmount,
            'Due_Date' => $dueDate,
            'Challan_No' => $challanno,
            'banks' => $banks,
        ]);
    }

    public function store_payment($id, PaymentDataEntryRequest $request): View
    {

        $payment = Payment::where('license_application_id', $id)->first();

        $payment->update([
//            if $request have data then this will be saved in table otherwise already present data in table which is
//            stored in $payment will be remain same in table as previously.
            'Paid_Amount' => $request->Paid_Amount ?? $payment->Paid_Amount,
            'Deposit_Date' => $request->Deposit_Date ?? $payment->Deposit_Date,
            'Verified_Date' => null,
            'Verify_By' => null,
            'Challan_Image' => $request->file('Challan_Image') ? $request->file('Challan_Image')
                ->store('', 'public') : $payment->Challan_Image,
            'Challan_No' => $request->Challan_No ?? $payment->Challan_No,
            'Remarks' => $request->Remarks ?? $payment->Remarks,
            'Transaction_Id' => $request->Transaction_Id ?? $payment->Transaction_Id,
            'Bank_Name' => $request->Bank_Name ?? $payment->Bank_Name,
            'Branch_Code' => $request->Branch_Code ?? $payment->Branch_Code,
        ]);

        $license = LicenseApplication::where('id', $payment->license_application_id)->first();
        $procLvl = 'Submitted';

        $license->update([
            'ProcLvl' => $procLvl,
        ]);

        return \view('/dashboard');
    }


}
