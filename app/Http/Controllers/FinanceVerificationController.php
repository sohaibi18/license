<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\LicenseApplication;
use App\Models\LicenseCategory;
use App\Models\Owner;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\View\View;
use Carbon\Carbon;

class FinanceVerificationController extends Controller
{
    public function display_For_Verification($userid): View
    {
        // Get applications where at least one of the specified fields is null
        $payments = Payment::with('license_applications')
            ->where(function ($query) {
                $query->whereNull('Paid_Amount')
                    ->orWhereNull('Deposit_Date')
                    ->orWhereNull('Challan_Image')
                    ->orWhereNull('Challan_No')
                    ->orWhereNull('Transaction_Id');
            })
            ->get();

        // Pass the data to the view
        return view('license.finance-verification', [
            'userid' => $userid,
            'payments' => $payments,
        ]);
    }


    public function show_finance_verification($userid, $license_application_id): View
    {

        $payment = Payment::where('license_application_id', $license_application_id)->first();
        $dueAmount = $payment->Due_Amount;
        $paidAmount = $payment->Paid_Amount;
        $dueDate = $payment->Due_Date;
        $depositDate = $payment->Deposit_Date;
        $challanImage = $payment->Challan_Image;
        $challanNo = $payment->Challan_No;
        $transactionId = $payment->Transaction_Id;
        $bankName = $payment->Bank_Name;

        return view('license.show-verification-form', [
            'userid' => $userid, 'Due_Amount' => $dueAmount, 'Paid_Amount' => $paidAmount, 'Due_Date' => $dueDate,
            'Deposit_Date' => $depositDate, 'Challan_Image' => $challanImage, 'Challan_No' => $challanNo,
            'Transaction_Id' => $transactionId, 'Bank_Name' => $bankName, 'licenseappid' => $license_application_id,
        ]);
    }

    public function finance_verified($userid, $licenseappid): View
    {
        $payment = Payment::where('license_application_id', $licenseappid)->first();

        // Update the payment record with new data
        $payment->update([
//            if $request have data then this will be saved in table otherwise already present data in table which is
//            stored in $payment will be remain same in table as previously.
            'Paid_Amount' => $payment->Paid_Amount,
            'Deposit_Date' => $payment->Deposit_Date,
            'Verified_Date' => Carbon::now() ?? $payment->Verified_Date,
            'Verify_By' => $userid ?? $payment->Verify_By,
            'Challan_Image' => $payment->Challan_Image,
            'Challan_No' => $payment->Challan_No,
            'Remarks' => $payment->Remarks,
            'Transaction_Id' => $payment->Transaction_Id,
            'Bank_Name' => $payment->Bank_Name,
            'Branch_Code' => $payment->Branch_Code,
        ]);

        $license = LicenseApplication::where('id', $licenseappid)->first();
        $procLvl = 'Finance Verified';

        $license->update([
            'ProcLvl' => $procLvl,
        ]);
        $successMessage = 'Application is Successfully Verified';

        return view('license.finance-verified-successfully', compact('successMessage'));

    }
}
