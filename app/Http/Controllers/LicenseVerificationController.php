<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\LicenseApplication;
use App\Models\LicenseCategory;
use App\Models\Owner;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class LicenseVerificationController extends Controller
{

    public function display_For_Verification($userid): View
    {
        // Get applications where ProcLvl is Finance Verified and Submit_Date is not null
        $verifiedApplications = LicenseApplication::where('ProcLvl', 'Finance Verified')
            ->whereNotNull('Submit_Date')
            ->get();

        // Pass the data to the view
        return view('license.license-verification', [
            'userid' => $userid,
            'licenseapplications' => $verifiedApplications,
        ]);
    }


    public function show_license_verification($userid, $id): View
    {
        $payment = Payment::with('license_applications.business.owner')
            ->where('license_application_id', $id)
            ->first();

        // Check if $payment is not null before accessing its properties

        $licenses = $payment->license_applications;

        return view('license.show-license-verification-form', [
            'userid' => $userid,
            'payment' => $payment,
            'license' => $licenses, // Use the correct variable name
        ]);
    }

    public function license_verified($id, $userid): View
    {
        $license = LicenseApplication::where('id', $id)->first();

        $procLvl = 'License Approved';
        $license->update([
            'ProcLvl' => $procLvl ?? $license->ProcLvl,
            'Issue_Date' => null,
            'Expire_Date' => null,
            'License_No' => null,
        ]);

        $successMessage = 'Application is Successfully Verified';

        return view('license.license-verified-successfully', compact('successMessage'));
    }

    public function show($userid): View
    {
        $license = LicenseApplication::where('ProcLvl', 'License Approved')
            ->wherenotnull('Submit_Date')
            ->get();


        return \view('license.show-applications-issue', [
            'userid' => $userid,
            'licenses' => $license,
        ]);
    }

    public function issue_License($userid, $id): View
    {
        $license = LicenseApplication::where('id', $id)->first();

        return \view('license.issue-license-number', [
            'userid' => $userid,
            'id' => $id,
        ]);
    }

    public function issue_License_number($userid, $id)
    {
        $license = LicenseApplication::where('id', $id)->first();
        $issueDate = Carbon::now();
        $expireDate = $issueDate->addYears(2);

        
    }
}
