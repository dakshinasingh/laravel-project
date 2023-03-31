<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    //show login page
	public function ShowLogin(){
		return view('pages.login');
	}

	//show register page
	public function ShowRegister(){
		return view('pages.register');
	}

	
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

		//login in
		Auth::login($user);
		return back()->with('success', 'successfully logged in');
	}

	public function logout(){
		Auth::logout();
		return back();
	}

	//login user
	
	public function postLogin(Request $request){
		//validate
		$details = $request->validate([
			'email' =>'required|email',
			'password' =>'required'
		]);

		if(Auth::attempt($details)){
			return redirect()->intended('/');
		}
		return back()->withErrors([
			'email' => 'Invalid details'
		]);
		
	}
}
