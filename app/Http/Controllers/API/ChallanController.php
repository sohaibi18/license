<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\LicenseApplication;
use App\Models\Payment;
use Illuminate\Http\Request;

class ChallanController extends Controller
{
    public function show(Request $request)
    {

        // Extracting Challan_No from the request body JSON
        $requestData = $request->json()->all();
        $challanNo = $requestData['Challan_No'];

        // Finding the Payment record with the extracted Challan_No
        $challan = Payment::where('Challan_No', $challanNo)
            ->select('due_date', 'due_amount', 'license_application_id') // Selecting additional fields
            ->first();

        if ($challan) {
            // Return challan along with due_date and due_amount
            return response()->json([
                'license_application_id' => $challan->license_application_id,
                'due_date' => $challan->due_date,
                'due_amount' => $challan->due_amount
            ]);
        } else {
            // Handle case where $challan is not found
            return response()->json(['error' => 'Challan not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $requestData = $request->json()->all();
        $challanNo = $requestData['Challan_No'];
        $licenseappid = $requestData['license_application_id'];
        $challanimage = 'Bank Auto Verified';
        $remarks = 'Recommended';
        $payment = Payment::where('Challan_No', $challanNo)->first();
        if ($payment) {
            $payment->update([
                'Paid_Amount' => $requestData['Paid_Amount'] ?? $payment->Paid_Amount,
                'Deposit_Date' => $requestData['Deposit_Date'] ?? $payment->Deposit_Date,
                'Verified_Date' => null,
                'Verify_By' => null,
                'Challan_Image' => $challanimage,
                'Remarks' => $remarks,
                'Transaction_Id' => $requestData['Transaction_Id'] ?? $payment->Transaction_Id,
                'Bank_Name' => $requestData['Bank_Name'] ?? $payment->Bank_Name,
                'Branch_Code' => $requestData['Branch_Code'] ?? $payment->Branch_Code,
            ]);
            $license = LicenseApplication::where('id', $licenseappid)->first();
            $procLvl = 'Finance Verified';

            $license->update([
                'ProcLvl' => $procLvl,
            ]);
            return response()->json(['message' => 'Payment updated successfully']);
        } else {
            return response()->json(['error' => 'Payment not found'], 404);
        }

    }

}
