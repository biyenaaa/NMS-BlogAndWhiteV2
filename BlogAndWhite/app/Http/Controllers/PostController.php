<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TblPosts;
use Auth;
use App\Http\Controllers\SessionController;

class PostController extends SessionController {

	// public function manage_posts(){
	// 	$data=[];
	// 	$data['posts']=TblPosts::posts_get();
	// 	return view('managePosts', $data);
	// }

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

}
