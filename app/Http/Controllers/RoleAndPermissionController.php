<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoleAndPermissionController extends Controller
{
    public function show_roles_permissions($id): View
    {

        $users = User::with('roles.permissions')->get();
        return view('rolesandpermissions.show-roles-permissions', compact('users'), ['id' => $id]);

    }

    public function assign_roles_permissions($id): View
    {
        $user = User::all();
        $role = Role::all();
        $permission = Permission::all();
        return \view('rolesandpermissions.assign-roles-permissions', ['id' => $id, 'users' => $user,
            'roles' => $role, 'permissions' => $permission]);
    }

    public function save_roles_permissions($id, Request $request)
    {

        $userId = $request->input('user_id');
        $user = User::findOrFail($userId);

        // Retrieve selected roles and permissions from the request
        $selectedRoles = $request->input('roles', []);
        $selectedPermissions = $request->input('permissions', []);

        // Attach selected roles to the user
        $user->roles()->attach($selectedRoles);

        // Attach selected permissions to the roles
        foreach ($selectedRoles as $roleId) {
            $role = Role::findOrFail($roleId);
            $role->permissions()->attach($selectedPermissions);
        }

        $users = User::all();
        return \view('rolesandpermissions.show-roles-permissions', ['users' => $users, 'id' => $id]);

    }
}
