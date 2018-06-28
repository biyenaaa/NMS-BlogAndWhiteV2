<?php
namespace App\Http\Controllers;
use App\Models\TblComments;

class CommentsController extends Controller {

	public static function index(){
		$data=[];
		$data['comments']=TblComments::get_comments();
		return view('manageComments', $data);
	}

	//update
	public static function update_comments(Request $request){
		$data=$request->all();
		// $account_id=$data['accId'];
		TblComments::update_comments( $data );
		return \Redirect::to('/admin/manage_comments');
	}

	// public static function get_comments(){
	// 	$comments=TblComments::get_comments();
	// 	echo(json_encode($comments));
	// }
}