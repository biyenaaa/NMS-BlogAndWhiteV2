<?php 
namespace App\Http\Controllers;
use App\Models\TblPosts;

class PostController extends Controller {
	
	public function index(){
		$data=[];
		$data['posts']=TblPosts::get_posts();
		return view('home', $data);
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

}
