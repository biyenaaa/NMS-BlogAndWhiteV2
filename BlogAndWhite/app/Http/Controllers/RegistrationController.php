<?php

namespace App\Http\Controllers;

use App\Models\TblAccounts;
use Illuminate\Http\Request;
use App\User;
use View, Validator, Input, Auth, Session;

class RegistrationController extends Controller {

	public function createRegistration() {
		return View::make('register');
	}

	public static function add_account(Request $request) {
		$rules = array(
			'username' => 'required',
	 		'email' => 'required|email',
	 		'password' => 'required|min:8|confirmed'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			Session::flash('errormsg', 'Password does not match or must be at least 8 characters.');

			return \Redirect::to('/register')
						->withErrors($validator)
						->withInput();
		} else {
			//echo 'Success!';
			//$user = User::create($request -> all(), ['username', 'email', 'password']);

			//auth()->login($user);

			$data = $request->all();
			$user = Tblaccounts::username_checker($data['username']);

			if(!empty($user)) {
				Session::flash('errmsg', 'Username is taken.');
				return \Redirect::to('register');
			} 
			// if(!confirmed(['password'])){
			// 	Session::flash('errormsg', 'Password does not match.');
			// 	return \Redirect::to('register');
			// } 
			else{
				TblAccounts::add_account($data);
				return \Redirect::to('/');
			}

			$user = User::create([
				'username' => $data['username'],
				'email' => $data['email'],
				'password' => $data['password']
			]);

			Auth::login($user);
			
		}		
	}
}
