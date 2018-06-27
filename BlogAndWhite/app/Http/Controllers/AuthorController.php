<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TblPosts;
use App\Models\TblAccounts;

class AuthorController extends Controller {
	
	public function index(){
		$data=[];
		$data['posts']=TblPosts::posts_info();
		return view('author_createblog', $data);
	}

	public function manage_posts(){
		$data=[];
		$data['posts']=TblPosts::posts_info();
		return view('managePosts', $data);
	}

	public static function get_posts(){
		$posts=TblPosts::get_posts();
		echo(json_encode($posts));
	}

	public static function posts_info(){
		$posts=TblPosts::posts_info();
		echo(json_encode($posts));
	}

	public static function manage_accounts(){
		$data=[];
		$data['accounts']=TblAccounts::get_accounts();
		return view('manageAccounts', $data);
	}

	//update
	public static function update_account(Request $request){
		$data=$request->all();
		// $account_id=$data['accId'];
		TblAccounts::update_account( $data );
	}

	//insert posts
	//view form
	public static function blog_form(){
		return view('author_createblog');
	}

	public static function insert_posts(Request $request){
		$data=$request->all();
		TblPosts::insert_posts( $data );
	}


	// public static function disable_account(Request $request){
	// 	$data=$request->all();
	// 	$account_id=$data['accId'];
	// 	echo $account_id;
	// }

}