<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleAndPermissionController extends Controller
{
    public function show_roles_permissions($id)
    {
        $user = User::all();
        $roles = Role::all();
        $permissions = Permission::all();
        $users = User::with('roles.permissions')->get();
        return view('rolesandpermissions.show-roles-permissions', compact('users'), ['id' => $id]);

    }
}
