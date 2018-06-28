<?php
namespace App\Http\Controllers;
use Session;

class SessionController extends Controller {
	public static function check_session(){
		$session=Session::get('loggedIn');
		if(!(Session::has('loggedIn'))){
			return \Redirect::to('/');
		}else{
			$username = $session['username'];
			return $username;
		}
	}
}