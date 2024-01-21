<?php

namespace App\Http\Controllers;

use App\Models\LicenseApplication;
use App\Models\Payment;
use App\Models\ProductApplication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductFinanceVerificationController extends Controller
{
    public function display_For_Verification($userid): View
    {
        // Get applications where at least one of the specified fields is null and ProcLvl is 'Submitted'
        $payment = Payment::with('product_applications')
            ->where(function ($query) {
                $query->whereNull('Deposit_Date')
                    ->orWhereNull('Verified_Date')
                    ->orWhereNull('Verify_By')
                    ->orWhereNull('Challan_Image')
                    ->orWhereNull('Challan_No')
                    ->orWhereNull('Transaction_Id');
            })
            ->whereHas('product_applications', function ($query) {
                $query->where('ProcLvl', 'Submitted');
            })
            ->get();

        // Pass the data to the view
        return view('product.finance-verification', [
            'userid' => $userid,
            'payments' => $payment,
        ]);
    }
    public function show_finance_verification($userid, $product_application_id): View
    {

        $payment = Payment::where('product_application_id', $product_application_id)->first();
        $dueAmount = $payment->Due_Amount;
        $paidAmount = $payment->Paid_Amount;
        $dueDate = $payment->Due_Date;
        $depositDate = $payment->Deposit_Date;
        $challanImage = $payment->Challan_Image;
        $challanNo = $payment->Challan_No;
        $transactionId = $payment->Transaction_Id;
        $bankName = $payment->Bank_Name;

        return view('product.show-verification-form', [
            'userid' => $userid, 'Due_Amount' => $dueAmount, 'Paid_Amount' => $paidAmount, 'Due_Date' => $dueDate,
            'Deposit_Date' => $depositDate, 'Challan_Image' => $challanImage, 'Challan_No' => $challanNo,
            'Transaction_Id' => $transactionId, 'Bank_Name' => $bankName, 'productappid' => $product_application_id,
        ]);
    }

    public function finance_verified($userid, $productappid): View
    {
        $payment = Payment::where('product_application_id', $productappid)->first();

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

        $license = ProductApplication::where('id', $productappid)->first();
        $procLvl = 'Finance Verified';

        $license->update([
            'ProcLvl' => $procLvl,
        ]);
        $successMessage = 'Product Application is Successfully Verified';

        return view('product.finance-verified-successfully', compact('successMessage'));

    }
}
