<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;

class UserController extends Controller
{
    public function show_users($id)
    {
        $users = User::all();
        return \view('users.show-users', [
            'users' => $users, 'id' => $id,
        ]);
    }

    public function create_user($userid): View
    {
        $id = $userid;
        return view('users.create-users', ['id' => $id]);
    }

    public function store_user($id, Request $request)
    {
        $user = User::all();
        // Validation rules
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|min:6|confirmed',
        ];
        $messages = [
            'password.confirmed' => 'The password does not match.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $password = Hash::make($request->password);
        $userdata = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'password_confirmation' => $password,
            'remember_token' => Str::random(60),
        ]);

        return \view('users.show-users', ['users' => $user, 'id' => $id]);
    }
}
