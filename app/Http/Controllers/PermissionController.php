<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PermissionController extends Controller
{
    public function show_permissions($id): View
    {
        $permission = Permission::all();
        return view('permissions.show-permissions', ['permissions' => $permission, 'id' => $id]);
    }

    public function create_permission($id): View
    {
        return \view('permissions.create-permissions', ['id' => $id]);
    }

    public function store_permission($id, Request $request): View
    {
        $permissions = Permission::all();
        $permission = $request->name;
        $slug = Str::slug($permission);
        $permissiondata = Permission::create([
            'name' => $permission,
            'slug' => $slug,
        ]);

        return \view('permissions.show-permissions', ['id' => $id, 'permissions' => $permissions]);
    }
}
