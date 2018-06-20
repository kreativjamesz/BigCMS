<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	return view('dashboard.profile');
    }
    public function updateProfile(Request $request)
    {

    	
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('old_password'), $request->get('new_password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        
        $valid = validator($request->only('old_password', 'new_password', 'confirm_password'), [
            	'old_password' => 'required|string|min:6',
            	'new_password' => 'required|string|min:6|different:old_password',
            	'confirm_password' => 'required_with:new_password|same:new_password|string|min:6',
            ], [
            	'confirm_password.required_with' => 'Confirm password is required.'
            ]
        );

        $validatedData = $request->validate([
            'old_password' => 'required|min:6',
            'new_password' => 'required|string|min:6|confirmed',
            'confirm_password' => 'required_with:new_password|same:new_password|min:6'
	        ], [
	        	'confirm_password.required_with' => 'Confirm password is required.'	
	        ]
	    );

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
 
        return redirect()->back()->with("success","Password changed successfully !");
        
    }
}
