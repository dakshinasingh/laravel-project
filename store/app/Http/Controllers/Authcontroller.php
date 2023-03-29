<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    //show login page
	static public function ShowLogin(){
		return view('pages/login');
	}

	//show register page
	static public function ShowRegister(){
		return view('pages/register');
	}

	//login user
	
	// public function userLogin(){
	// 	return view('pages/login');
	// }
	//register user
	public function postRegister(Request $request){

		//validation
		$request->validate([
			'name' => 'required|min:3|max:100',
			'email' => 'required|email|max:200|unique:users',
			'password' => 'required|min:8|confirmed'
		]);

		//registration
		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
		]);

		//login
		Auth::login($user);
		return back()->with('success', 'successfully logged in');
	}

	//reset password
}
