<?php 

namespace App\Http\Controllers;
use App\Models\TblPosts;
use App\Models\TblAccounts;
use App\Models\TblComments;
use Session;
use Auth;
use App\Http\Controllers\SessionController;

class AdminController extends SessionController {
	
	public function __construct()
	{
		$this->middleware('auth');
		if(Session::has('loggedIn')){
			if(TblAccounts::get_account_type(Session::get('loggedIn'))!='1'){
	        	Session::flush();
	        	return \Redirect::to('/');
			}
		}
		
		//return \Redirect::to('/login');
	}

	public static function index(){
		$data=[];
		$data['published_posts']=TblPosts::get_published_posts();
		$data['unpublished_posts']=TblPosts::get_unpublished_posts();
		$data['enabled_accounts']=TblAccounts::get_enabled_accounts();
		$data['disabled_accounts']=TblAccounts::get_disabled_accounts();
		$data['displayed_comments']=TblComments::get_displayed_comments();
		return view('adminHome', $data);
	}

	public static function comments(){
		$data=[];
		$data['comments']=TblComments::get_comments();
		return view('manageComments', $data);
	}

	// public static function update_comment(Request $request){
	// 	$data=$request->all();
	// 	// $account_id=$data['
	// 	TblComments::update_comment( $data );
	// 	return \Redirect::to('/admin/manage_comments');
	// }

	public static function manage_accounts(){
		$data=[];
		$data['accounts']=TblAccounts::get_accounts();
		return view('manageAccounts', $data);
	}

	public function manage_posts(){
		$data=[];
		$data['posts']=TblPosts::posts_get();
		return view('managePosts', $data);
	}


	// public static function accounts_count(){
	// 	$data['number_accounts']=TblAccounts::get_number_accounts();
	// 	return view('admin_home');
	// }	
}
