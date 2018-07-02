<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class TblPosts extends Model {
	protected $table='posts';

	public $timestamps = false;

	public static function get_posts(){
		$query = \DB::table('posts AS p')
				->select('p.id','p.title','p.content')
				->where('status','=','1')
				->get();
		return $query;
	}

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
		return $query;
	}

	public static function posts_get(){
		$query =\DB::table('posts AS p')
				->leftJoin('users AS a', 'a.id', '=', 'p.acc_id')
				->select('p.id', 'p.title', 'a.username', 'p.date_published', 'p.status')
				->get();

		return $query;
	}

	public static function author_posts( $params ){
		$query =\DB::table('posts AS p')
				->leftJoin('users AS a', 'a.id', '=', 'p.acc_id')
				->select('p.id', 'p.title', 'p.content', 'a.username', 'p.date_published', 'p.status')
				->where('a.username','=', $params['username'])
				->where('p.status','=','1')
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

	public static function update_blog( $params ){

		$post = TblPosts::find($params['postId']);
			$post->title = $params['title'];
			$post->content = $params['content'];

		try{
			$post->save();
		}
		catch (QueryException $e){
			die($e);
		}

	}

	public static function insert_posts( $params ){
		$acc_id = Auth::user()->id;

		$id = \DB::table('posts')->insert(
			['acc_id' => $acc_id, 'title' => $params['title'], 'content' => $params['content'] ]
		);
	}
}
