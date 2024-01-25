<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\LicenseApplication;
use App\Models\LicenseCategory;
use App\Models\Owner;
use App\Models\ProductApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OwnerController extends Controller
{

    public function show($userid): View
    {
        $id = $userid;
        $owner = Owner::all();
        return view('owner.owner-details', ['id' => $id, 'owners' => $owner]);
    }

    public function check_cnic_no(Request $request)
    {
        $cnic = $request->input('CNIC');
        $owner = Owner::where('CNIC', $cnic)->first();


        return response()->json(['exists' => $owner !== null]);
    }

    public function licensee_information($cnic)
    {
        $ownercnic = Owner::where('CNIC', $cnic)->first();

        if ($ownercnic) {
            $business = Business::where('owner_id', $ownercnic->id)->first();

            if ($business) {
                $licenses = LicenseApplication::where('business_id', $business->id)->get();
                $products = ProductApplication::where('business_id', $business->id)->get();

                return view('owner.owner-information', [
                    'owner' => $ownercnic,
                    'business' => $business,
                    'licenses' => $licenses,
                    'products' => $products,
                ]);
            }
        }

        // Handle the case where owner or business is not found
        return view('owner.owner-not-found');
    }

}
