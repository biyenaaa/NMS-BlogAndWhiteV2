<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TblPosts;
use Auth, Session;
use App\Http\Controllers\SessionController;

class PostController extends SessionController {

	public static function get_author_posts(){
		$session = Session::get('loggedIn');
		$data=[];
		$data['posts']=TblPosts::author_posts($session);
		return view('author_blogs', $data);
	}

	public static function get_posts(){
		$posts=TblPosts::post_info()->get();
		echo(json_encode($posts));
	}

	public static function posts_info(){
		$posts=TblPosts::get_posts();
		echo(json_encode($posts));
	}

	//update
	public static function update_post(Request $request){
		$data=$request->all();
		TblPosts::update_post( $data );
		return \Redirect::to('/admin/manage_posts');
	}

	public static function edit_post(Request $request){
		$data=$request->all();
		TblPosts::update_blog( $data );
		echo "success.";
		return \Redirect::to('/posts/'.$data['postId']);
	}

}
