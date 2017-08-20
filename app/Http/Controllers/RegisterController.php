<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\User;

class RegisterController extends Controller
{
    public function register()
    {
    	return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $user = Sentinel::registerAndActivate($request->all());

        $role = Sentinel::findRoleBySlug('manager');

        $role->users()->attach($user);

        return redirect()->route('login')->with('success', 'User Registered Successfully');
    }
}
