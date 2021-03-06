<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class LoginController extends Controller
{
    public function login()
    {
    	return view('auth.login');
    }

    public function postLogin(Request $request)
    {
    	Sentinel::authenticate($request->all());

        $slug = Sentinel::getUser()->roles()->first()->slug;

        if ($slug == 'admin') {
            return redirect('/forum');
        }elseif($slug == 'manager'){
            return redirect('/forum');
        }
    }

    public function logout()
    {
    	Sentinel::logout();
    	return redirect()->route('login');
    }
}
