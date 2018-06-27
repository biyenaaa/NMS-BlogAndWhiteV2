<?php 

namespace App\Http\Controllers;

use App\Http\Models\TblAccounts;

class Account extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		return view('welcome');
	}

	public function test()
	{
		die('hello');
		echo('tets');
	}

	public static function get_accounts()
	{
		$accounts=TblAccounts::get_accounts();
		echo(json_encode($accounts));
	}
}
