<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RoleController extends Controller
{
    public function show_roles($id): View
    {
        $role = Role::all();
        return view('roles.show-roles', ['roles' => $role, 'id' => $id
        ]);
    }

    public function create_role($id): View
    {
        return \view('roles.create-roles', ['id' => $id]);
    }

    public function store_role($id, Request $request)
    {
        $roles = Role::all();
        $role = $request->name;
        $slug = Str::slug($role);
        $roledata = Role::create([
            'name' => $role,
            'slug' => $slug,
        ]);
        return \view('roles.show-roles', ['roles' => $roles, 'id' => $id]);
    }
}
