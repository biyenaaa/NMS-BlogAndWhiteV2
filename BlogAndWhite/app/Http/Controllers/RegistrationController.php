<?php

namespace App\Http\Controllers;

use App\Models\TblAccounts;
use Illuminate\Http\Request;
use App\User;
use View, Validator, Input, Auth;

class RegistrationController extends Controller {

	public function createRegistration() {
		return View::make('register');
	}

	public static function add_account(Request $request) {
		$rules = array(
			'username' => 'required',
	 		'email' => 'required|email',
	 		'password' => 'required|min:8||confirmed'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return \Redirect::to('/register')
						->withErrors($validator)
						->withInput();
		} else {
			//echo 'Success!';
			//$user = User::create($request -> all(), ['username', 'email', 'password']);

			//auth()->login($user);

			$data = $request->all();
			TblAccounts::add_account($data);
			return \Redirect::to('/');
		}		
	}



}
