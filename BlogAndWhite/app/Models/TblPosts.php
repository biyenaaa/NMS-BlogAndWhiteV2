<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblPosts extends Model {
	protected $table='posts';
	public $timestamps = false;

	public static function get_posts(){
		$query = \DB::table('posts AS p')
				->select('p.title','p.content')
				->where('status','=','1')
				->get();
		return $query;
	}

	public static function posts_info(){
		$query =\DB::table('posts AS p')
				->leftJoin('accounts AS a', 'a.id', '=', 'p.acc_id')
				->select('p.id', 'p.title', 'a.username', 'p.date_published', 'p.status')
				->get();
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

	public static function insert_posts( $params ){
		$posts = new TblPosts;
		dd($params);
		$posts->title = $params['title'];
		$posts->content = $params['content'];
		try{	
			$posts->save();
		}
		catch (QueryException $e){
			die($e);
		}
	}
}
