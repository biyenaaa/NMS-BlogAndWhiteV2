<?php 
namespace App\Http\Controllers;
use App\Models\TblPosts;
use App\Models\TblAccounts;
use App\Models\TblComments;

class AdminController extends Controller {
	public static function index(){
		$data=[];
		$data['published_posts']=TblPosts::get_published_posts();
		$data['unpublished_posts']=TblPosts::get_unpublished_posts();
		$data['enabled_accounts']=TblAccounts::get_enabled_accounts();
		$data['disabled_accounts']=TblAccounts::get_disabled_accounts();
		$data['displayed_comments']=TblComments::get_displayed_comments();
		$data['hidden_comments']=TblComments::get_hidden_comments();
		return view('adminHome', $data);
	}

	// public static function accounts_count(){
	// 	$data['number_accounts']=TblAccounts::get_number_accounts();
	// 	return view('admin_home');
	// }	
}
