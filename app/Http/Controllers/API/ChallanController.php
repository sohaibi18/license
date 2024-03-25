<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
            ->select('due_date', 'due_amount') // Selecting additional fields
            ->first();

        if ($challan) {
            // Return challan along with due_date and due_amount
            return response()->json([
                'challan' => $challan,
                'due_date' => $challan->due_date,
                'due_amount' => $challan->due_amount
            ]);
        } else {
            // Handle case where $challan is not found
            return response()->json(['error' => 'Challan not found'], 404);
        }
    }
}
