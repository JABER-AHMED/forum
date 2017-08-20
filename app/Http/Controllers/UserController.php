<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use Sentinel;

class UserController extends Controller
{
    public function profile()
    {
    	return view('profile', array('user' => Sentinel::getUser() ));
    }

    public function update_profile(Request $request)
    {
    	//handle the user update of avatar

    	if ($request->hasFile('avatar')) {
    		
    		$avatar = $request->file('avatar');

    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename) );

    		$user = Sentinel::getUser();
    		$user->avatar = $filename;
    		$user->save();
    	}

    	return view('profile', array('user' => Sentinel::getUser() ));
    }
}
