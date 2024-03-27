<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class LicenseModificationController extends Controller
{
    public function show($userid)
    {
        $id = $userid;
        $owner = Owner::all();
        return view('LicenseModifications.show-license-category', ['id' => $id, 'owners' => $owner]);
    }
}
