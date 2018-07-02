<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Models\TblComments;
use App\Models\TblPosts;
use App\Models\TblComments;

class PublicController extends Controller {
	public function index(){
		$data=[];
		$data['posts']=TblPosts::posts_info()->get();
		#dd($data);
		return view('home', $data);
	}

	public static function add_comment(Request $request){
		$data=$request->all();
		TblComments::insert_comments( $data );
		$view = '/posts/'.$data['post_id'];
		return \Redirect::to($view);
	}

	public static function show($id){
		$post = TblPosts::posts_info([ 'id' => $id ])
				->first();

		$comments=TblComments::get_post_comments($post->id)->get();
		$data['post'] = $post;
		$data['comments'] = $comments;
		#dd($data);
		return view('posts_show', $data);
		#return view('posts_show')->with('post', $data);
	}
}