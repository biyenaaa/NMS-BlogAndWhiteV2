<?php

namespace App\Http\Controllers;

use Session;
use App\Models\TblAccounts;
use View, Validator, Input, Auth;
//use Illuminate\Support\Facades\View;

class LoginController extends Controller{

	public function showLogin() {
		return View::make('login');
	}

	public function doLogin() {
		
		//create rules for the input
		$rules = array(
			'username' => 'required',
			'password' => 'required|alphaNum|min:8'
		);

		//run the validation rulles on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		//if the validator fails, redirect back to the form
		if($validator->fails()){
			return \Redirect::to('login')
				->withErrors($validator) //send back the errors to the form
				->withInput(Input::except('password')); //send back input data except password
			//echo "Fail";
		} else {
			$userdata = array(
				'username' => Input::get('username'),
				'password' => Input::get('password')
			);

			//login
			if(Auth::attempt($userdata)) {
				Session::put(['loggedIn'=>$userdata]);
				return \Redirect::to('/');
				//echo 'You have successfully logged in.';
			} else {
				return \Redirect::to('login');
			}
		}
	}

	public function doLogout() {
		Session::flush();
		return \Redirect::to('/');
	}
}