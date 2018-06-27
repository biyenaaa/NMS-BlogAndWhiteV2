<?php
namespace App\Http\Controllers;
use App\Models\TblAccounts;

class AccountController extends Controller {
	
	public function index(){
		$data=[];
		$data['accounts']=TblAccounts::get_accounts();
		return view('blog', $data);
	}

	public function get_accountInfo(){
		$data=[];
		$data['accounts']=TblAccounts::get_accounts();
		return view('manageAccounts', $data);
	}

	public static function get_accounts(){
		$accounts=TblAccounts::get_accounts();
		echo(json_encode($accounts));
	}

}