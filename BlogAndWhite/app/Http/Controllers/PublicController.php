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

		$comments=TblComments::get_post_comments(['post_id' =>$post->id])
				->get();

				#dd($comments);
		$data['post'] = $post;
		$data['comments'] = $comments;

		#dd($data['comments']);
		return view('posts_show', $data);
		#return view('posts_show')->with('post', $data);
	}
}