<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblPosts extends Model {
	protected $table='posts';
<<<<<<< HEAD

=======
>>>>>>> 3d58a77b24a798ae2c721e5f0e22c8e94eea7da7
	public $timestamps = false;

	public static function get_posts(){
		$query = \DB::table('posts AS p')
				->select('p.id','p.title','p.content')
				->where('status','=','1')
				->get();
		return $query;
	}

<<<<<<< HEAD
	public static function posts_info( $params=null ){
		$query = \DB::table('posts AS p')
				->leftJoin('users AS a', 'a.id', '=', 'p.acc_id')
				->select('p.id', 'p.title', 'a.username', 'p.date_published', 'p.status', 'p.content')
				->where('p.status','=','1')
				->where('a.status','=','1');

		if( isset( $params['id'] ) )
		{
			$query->where('p.id','=',$params['id']);
		}
				//->get();
=======
	public static function posts_info(){
		$query =\DB::table('posts AS p')
				->leftJoin('users AS a', 'a.id', '=', 'p.acc_id')
				->select('p.id', 'p.title', 'a.username', 'p.date_published', 'p.status')
				->get();
>>>>>>> 3d58a77b24a798ae2c721e5f0e22c8e94eea7da7
		return $query;
	}

	public static function get_published_posts(){
		$query = \DB::table('posts AS p')
				->where('status','=','1')
				->count();
		return $query;
	}

	public static function get_unpublished_posts(){
		$query = \DB::table('posts AS p')
				->where('status','=','0')
				->count();
		return $query;
	}

	public static function update_post( $params ){
		$post = TblPosts::find($params['postId']);

		if(isset($params['status']))
			$post->status = $params['status'];

		try {
			$post->save();
			//die('successfully updated account');
		}
		catch (QueryException $e) 
		{
			die($e);
		}
	}

	public static function update_blogs( $params ){

		$post = TblPosts::find($params['postId']);;
		if(isset($params['title']) && isset($params['content'])){
			$post->title = $params['title'];
			$post->content = $params['content'];
		}

		try{
			$post->save();
		}
		catch (QueryException $e){
			die($e);
		}

	}


	/**public static function insert_posts( $params ){
		$posts = new TblPosts;
		dd($params);
		$posts->title = $params['title'];
		$posts->content = $params['content'];
		$timestamps = true;
		$posts->date_published = $params['date_published'];
		try{	
			$posts->save();
		}
		catch (QueryException $e){
			die($e);
		}
	}**/
}
