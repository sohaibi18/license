<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\BusinessType;
use App\Models\District;
use App\Models\LicenseCategory;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductApplicationController extends Controller
{
    public function show($id): View
    {
        $licensecategories = LicenseCategory::all();
        $owners = Owner::all();
        $businesses = Business::all();
        return view('product.show-product-application-form', [
            'id' => $id, 'licensecategories' => $licensecategories, 'owners' => $owners, 'business' => $businesses,
        ]);
    }
}
