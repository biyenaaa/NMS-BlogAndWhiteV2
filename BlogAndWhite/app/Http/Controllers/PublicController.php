<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Models\TblComments;
use App\Models\TblPosts;

class PublicController extends Controller {
	public function index(){
		$data=[];
		$data['posts']=TblPosts::posts_info()->get();
		#dd($data);
		return view('home', $data);
	}
	public static function show($id){
		$post = TblPosts::posts_info([ 'id' => $id ])
				->first();
		//dd($post->select('*')->first()->toArray());
		return view('posts_show')->with('post', $post);
	}
}