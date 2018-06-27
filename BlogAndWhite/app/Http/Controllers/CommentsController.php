<?php
namespace App\Http\Controllers;
use App\Models\TblComments;

class CommentsController extends Controller {

	public static function index(){
		$data=[];
		$data['comments']=TblComments::get_comments();
		return view('manageComments', $data);
	}

	// public static function get_comments(){
	// 	$comments=TblComments::get_comments();
	// 	echo(json_encode($comments));
	// }
}