<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TblPosts;

class PostController extends Controller {
	
	public function index(){
		$data=[];
		$data['posts']=TblPosts::posts_info();
		#dd($data);
		return view('home', $data);
	}

	public function manage_posts(){
		$data=[];
		$data['posts']=TblPosts::posts_get();
		return view('managePosts', $data);
	}

	public static function get_posts(){
		$posts=TblPosts::post_info();
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

	public static function show($id){
		$post = TblPosts::posts_info([ 'id' => $id ])
				->first();
		//dd($post->select('*')->first()->toArray());
		return view('posts_show')->with('post', $post);
	}



}
