<?php

namespace App\Http\Controllers;

use App\Http\Requests\LicenseNumberIssueRequest;
use App\Http\Requests\ProductRegistrationNumberIssueRequest;
use App\Models\LicenseApplication;
use App\Models\Payment;
use App\Models\ProductApplication;
use Carbon\Carbon;
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

    public function show_product_verification($userid, $id): View
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

    public function product_verified($id, $userid): View
    {
        $product = ProductApplication::where('id', $id)->first();

        $procLvl = 'License Approved';
        $product->update([
            'ProcLvl' => $procLvl ?? $product->ProcLvl,
            'Issue_Date' => null,
            'Expire_Date' => null,
            'License_No' => null,
        ]);

        $successMessage = 'Product Application is Successfully Verified';

        return view('product.product-verified-successfully', compact('successMessage'));
    }

    public function show($userid): View
    {
        $product = ProductApplication::where('ProcLvl', 'License Approved')
            ->wherenotnull('Submit_Date')
            ->get();


        return \view('product.show-applications-issue', [
            'userid' => $userid,
            'products' => $product,
        ]);
    }

    public function issue_Product($userid, $id): View
    {
        $lastProductRegNumber = ProductApplication::whereNotNull('Product_Registration_No')->orderBy('id', 'desc')->value('Product_Registration_No');
        $nextProductRegNumber = $lastProductRegNumber ? ++$lastProductRegNumber : 1;
        $product = ProductApplication::where('id', $id)->first();

        return \view('product.issue-product-number', [
            'userid' => $userid,
            'id' => $id,
            'nextProductRegNumber' => $nextProductRegNumber,
        ]);
    }

    public function issue_Product_number($userid, $id, ProductRegistrationNumberIssueRequest $request): View
    {
        $product = ProductApplication::where('id', $id)->first();
        $expireDate = Carbon::now()->addYears(2);
        $procLvl = 'Issued';
        $product->update([
            'ProcLvl' => $procLvl,
            'Product_Registration_No' => $request->Product_Registration_No,
            'Issue_Date' => Carbon::now(),
            'Expire_Date' => $expireDate,
        ]);
        $successMessage = 'Product Registration Number Issued Successfully';
        return \view('product.product-number-issued', compact('successMessage'));
    }

    public function show_ReadyforPrint($userid): View
    {
        $product = ProductApplication::where('ProcLvl', 'Issued')
            ->wherenotnull('Product_Registration_No')
            ->wherenotnull('Issue_Date')
            ->wherenotnull('Expire_Date')
            ->paginate(10);

        return \view('product.show-print-ready-applications', [
            'userid' => $userid,
            'products' => $product,

        ]);
    }

    public function print_product($userid, $id): View
    {
        $product = ProductApplication::where('id', $id)->first();
        return \view('product.product-print-layout', [
            'userid' => $userid,
            'products' => $product,
        ]);
    }
}
