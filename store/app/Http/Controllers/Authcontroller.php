<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
	
	//register user

	//reset password
}
