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

		$validator = Validator::make(Input::all(), [
			'username' => 'required',
	 		'email' => 'required|email',
	 		//'password' => 'required|min:8|confirmed'
		]);

		$validator1 = Validator::make(Input::all(), [ 
			'password' => 'required|min:8'
		]);

		$validator2 = Validator::make(Input::all(), [
			'password' => 'required|confirmed'
		]);

		if($validator->fails()) {

			return \Redirect::to('/register')
						->withErrors($validator)
						->withInput();
		} else {
			$data = $request->all();
			$user = Tblaccounts::username_checker($data['username']);

			if(!empty($user)) {
				Session::flash('errmsg1', 'Username is taken.');
				return \Redirect::to('register');
			} if($validator1->fails()) {
				Session::flash('errmsg2', 'Password must be at least 8 characters.');
				return \Redirect::to('register');
			} if($validator2->fails()) {
				Session::flash('errmsg3', 'Password does not match.');
				return \Redirect::to('register');
			} else{
				TblAccounts::add_account($data);
				return \Redirect::to('/');
			}

			 

			$user = User::create([
				'username' => $data['username'],
				//'email' => $data['email'],
				'password' => $data['password']
			]);

			Auth::login($user);
			
		}		
	}
}
