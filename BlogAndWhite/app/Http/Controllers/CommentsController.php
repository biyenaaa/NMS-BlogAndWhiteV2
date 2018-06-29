<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TblComments;

class CommentsController extends Controller {

	// public static function index(){
	// 	$data=[];
	// 	$data['comments']=TblComments::get_comments();
	// 	return view('manageComments', $data);
	// }

	//update
	public static function update_comment(Request $request){
		$data=$request->all();
		// $account_id=$data['
		TblComments::update_comment( $data );
		return \Redirect::to('/admin/manage_comments');
	}

	// public static function get_comments(){
	// 	$comments=TblComments::get_comments();
	// 	echo(json_encode($comments));
	// }

	//show comments



}