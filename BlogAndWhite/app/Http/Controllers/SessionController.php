<?php
namespace App\Http\Controllers;
use Session, Auth;

class SessionController extends Controller {
	public function __construct()
	{
		$this->middleware('auth');

		if(Auth::check() && session()->has('loggedIn'))
		{
			return \Redirect::to('/');
		} 
		
		return \Redirect::to('/login');
	}
}