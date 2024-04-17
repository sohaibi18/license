<?php

namespace App\Http\Controllers;

use App\Models\LicenseApplication;
use App\Models\LicenseCategory;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LicenseModificationController extends Controller
{
    public function show($userid): View
    {
        $id = $userid;
        $owner = Owner::all();
        return view('LicenseModifications.show-license-category', ['id' => $id, 'owners' => $owner]);
    }

    public function show_update_category($id): View
    {
        $appid = LicenseApplication::with('licenseCategory')->find($id);
        $licensecategories = LicenseCategory::all();
        return view('LicenseModifications.show-update-category', ['id' => $id, 'appid' => $appid,
            'licensecategories' => $licensecategories]);
    }

    public function update_category($id, Request $request)
    {
        
    }
}
