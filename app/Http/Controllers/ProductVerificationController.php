<?php

namespace App\Http\Controllers;

use App\Models\LicenseApplication;
use App\Models\Payment;
use App\Models\ProductApplication;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductVerificationController extends Controller
{
    public function display_For_Verification($userid): View
    {
        // Get applications where ProcLvl is Finance Verified and Submit_Date is not null
        $verifiedApplications = ProductApplication::where('ProcLvl', 'Finance Verified')
            ->whereNotNull('Submit_Date')
            ->get();

        // Pass the data to the view
        return view('product.product-verification', [
            'userid' => $userid,
            'productapplications' => $verifiedApplications,
        ]);
    }

    public function show_product_verification($userid, $id)
    {
        $payment = Payment::with('product_applications.business.owner')
            ->where('product_application_id', $id)
            ->first();

        // Check if $payment is not null before accessing its properties

        $products = $payment->product_applications;

        return view('product.show-product-verification-form', [
            'userid' => $userid,
            'payment' => $payment,
            'product' => $products, // Use the correct variable name
        ]);
    }
}
