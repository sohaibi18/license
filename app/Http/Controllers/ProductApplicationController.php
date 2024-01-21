<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicantDataEntryRequest;
use App\Models\Business;
use App\Models\BusinessType;
use App\Models\District;
use App\Models\LicenseApplication;
use App\Models\LicenseCategory;
use App\Models\Owner;
use App\Models\Payment;
use App\Models\ProductApplication;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductApplicationController extends Controller
{
    public function show($id): View
    {
        $licensecategories = LicenseCategory::all();
        return view('product.show-product-application-form', [
            'id' => $id, 'licensecategories' => $licensecategories,
        ]);
    }

    public function check_cnic(Request $request)
    {
        $cnic = $request->input('CNIC');
        $owner = Owner::where('CNIC', $cnic)->first();

        return response()->json(['exists' => $owner !== null]);

    }

    public function check_business(Request $request)
    {
        $business_name = $request->input('Business_Name');
        $business = Business::where('Business_Name', $business_name)->first();

        if ($business) {
            $business_address = $business->Business_Address;
            return response()->json(['exists' => true, 'address' => $business_address]);
        } else {
            return response()->json(['exists' => false, 'address' => null]);
        }
    }


    public function check_product(Request $request)
    {
        $product_name = $request->input('Product_Name');
        $product = ProductApplication::where('Product_Name', $product_name)->first();
        return response()->json(['exists' => $product !== null]);
    }

    public function store($id, Request $request): RedirectResponse
    {

        $labreport = $request->file('Lab_Analysis_Report')->store('', 'public');
        $productlabel = $request->file('Product_Label')->store('', 'public');

        $affidavitpath = null;
        if ($request->hasFile('Affidavit')) {
            $affidavitpath = $request->file('Affidavit')->store('', 'public');
        }

        $ownercnic = $request->input('CNIC');
        $owner = Owner::where('CNIC', $ownercnic)->first();
        if ($owner) {
            $ownerId = $owner->id;
        }

        $businessname = $request->input('Business_Name');
        $business = Business::where('Business_Name', $businessname)->first();
        if ($business) {
            $businessId = $business->id;
        }

        $procLvl = $request->input('ProcLvl', 'Pending');

        $product = ProductApplication::create([
            'business_id' => $businessId,
            'owner_id' => $ownerId,
            'Product_Name' => $request->Product_Name,
            'Lab_Analysis_Report' => $labreport,
            'Product_Label' => $productlabel,
            'license_category_id' => $request->licensecategories[0],
            'ProcLvl' => $procLvl,
            'Affidavit' => $affidavitpath,
            'Expire_Date' => null,
            'Product_Registration_No' => null,  // Set 'Product Registration No' to null initially
            'QRImage' => null,  // Set 'QRImage' to null initially
            'user_id' => $id,
            'Update_Date' => Carbon::now(),
            'Submit_Date' => Carbon::now(),
            'Finance_Verified_Date' => null,
            'Registration_Approved_Date' => null,
            'Printed_Date' => null,
            'Dispatched_Date' => null,
            'Issue_Date' => null,
        ]);

        $productid = $product->id;

        $license_category = $product->license_category;
        $licensecatfee = $license_category->License_Fee;

        $licensefeedate = $product->Submit_Date;
        $licensefeeduedate = clone $licensefeedate; // create a copy to avoid modifying the original object
        $licensefeeduedate->modify('+1 month');

        $payment = Payment::create([
            'license_application_id' => null,
            'product_application_id' => $productid,
            'Due_Amount' => $licensecatfee,
            'Paid_Amount' => null,
            'Due_Date' => $licensefeeduedate,
            'Deposit_Date' => null,
            'Verified_Date' => null,
            'Verify_By' => null,
            'Challan_Image' => null,
            'Challan_No' => null,
            'Remarks' => null,
            'Transaction_Id' => null,
            'Bank_Name' => null,
            'Branch_Code' => null,
        ]);
        return redirect('/dashboard')->with('success_message', 'Product Application created successfully. ID: ' . $product->id);
    }

    public function show_applications(): View
    {
        $productapplications = ProductApplication::all();
        $processedPaymentIds = Payment::where('Due_Amount', '>', 0)
            ->where('Paid_Amount', '>', 0) // Add conditions for Paid_Amount
            ->whereNotNull('Deposit_Date')  // Add conditions for Deposit_Date
            ->whereNotNull('Challan_Image') // Add conditions for Challan_Image
            ->whereNotNull('Challan_No')     // Add conditions for Challan_No
            ->whereNotNull('Transaction_Id') // Add conditions for Transaction_Id
            ->pluck('product_application_id')
            ->toArray();
        $filteredProductApplications = $productapplications->reject(function ($productapplication) use ($processedPaymentIds) {
            return in_array($productapplication->id, $processedPaymentIds);
        });
        return view('product.display-submitted-applications', [
            'productapplications' => $filteredProductApplications,
        ]);
    }

    public function attach_documents($id): View
    {
        $payment = Payment::where('product_application_id', $id)->first();
        $dueAmount = $payment->Due_Amount;
        $dueDate = $payment->Due_Date;

        $banks = ['MCB', 'UBL', 'EasyPaisa', 'JazzCash'];

        return view('product.show-product-attach-document', [
            'id' => $id,
            'Due_Amount' => $dueAmount,
            'Due_Date' => $dueDate,
            'banks' => $banks,
        ]);
    }

    public function store_payment($id, Request $request): View
    {
        $payment = Payment::where('product_application_id', $id)->first();

        // Update the payment record with new data
        $payment->update([
//            if $request have data then this will be saved in table otherwise already present data in table which is
//            stored in $payment will be remain same in table as previously.
            'Paid_Amount' => $request->Paid_Amount ?? $payment->Paid_Amount,
            'Deposit_Date' => $request->Deposit_Date ?? $payment->Deposit_Date,
            'Verified_Date' => null,
            'Verify_By' => null,
            'Challan_Image' => $request->file('Challan_Image') ? $request->file('Challan_Image')->store('', 'public') : $payment->Challan_Image,
            'Challan_No' => $request->Challan_No ?? $payment->Challan_No,
            'Remarks' => $request->Remarks ?? $payment->Remarks,
            'Transaction_Id' => $request->Transaction_Id ?? $payment->Transaction_Id,
            'Bank_Name' => $request->Bank_Name ?? $payment->Bank_Name,
            'Branch_Code' => $request->Branch_Code ?? $payment->Branch_Code,
        ]);

        $product = ProductApplication::where('id', $payment->product_application_id)->first();
        $procLvl = 'Submitted';

        $product->update([
            'ProcLvl' => $procLvl,
        ]);

        return \view('/dashboard');
    }


}


