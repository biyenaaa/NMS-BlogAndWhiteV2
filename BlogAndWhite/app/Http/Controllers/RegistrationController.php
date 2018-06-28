<?php

namespace App\Http\Controllers;

use App\Models\TblAccounts;
use Illuminate\Http\Request;
use App\User;
use View, Validator;

class RegistrationController extends Controller {

	public function createRegistration() {
		return View::make('register');
	}

	public function storeRegistration(Request $request) {
		$validator = Validator::make($request->all(), ['username' => 'required',
			'email' => 'required|email',
			'password' => 'required|min:8'
		]);

		if($validator->fails()) {
			return redirect('/home')
						->withErrors($validator)
						->withInput();
		} else {
			echo 'Success!';
		}

		//$user = User::create(request(['username', 'email', 'password']);

		// auth()->login($user);

		//return redirect()->to('/home');
	}

	public static function add_accounts(Request $request) {
		$data = $request->all();

		TblAccounts::add_accounts($data);
		//echo $data;

	}

}