<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblComments extends Model {

	protected $table='comments';
	public $timestamps = false;

	public static function get_comments(){
		$query = \DB::table('comments AS c')
				->leftJoin('posts AS p', 'p.id', '=', 'c.post_id')
				->select('c.id', 'c.name', 'p.title', 'c.status', 'c.date_commented', 'c.comment_content')
				->where('c.status','=','1')
				->get();
		return $query;
	}

<<<<<<< HEAD
	public static function posts_info( $params=null ){
		$query = \DB::table('comments AS c')
				->leftJoin('posts AS p', 'p.id', '=', 'c.post_id')
				->select('c.id', 'c.name', 'p.title', 'c.status', 'c.date_commented', 'c.comment_content')
				->where('c.status','=','1')
				->where('c.status','=','1');

		if( isset( $params['post_id'] ) )
		{
			$query->where('p.id','=',$params['id']);
		}
		return $query;
	}

	// public static function get_displayed_comments(){
	// 	$query = \DB::table('comments AS c')
	// 			->where('status','=','1')
	// 			->count();
	// 	return $query;
	// }
=======
	public static function get_displayed_comments(){
		$query = \DB::table('comments AS c')
				->where('status','=','1')
				->count();
		return $query;
	}
>>>>>>> a499b6f54faec4b125b491fef25d6133111d4331

	// public static function get_hidden_comments(){
	// 	$query = \DB::table('comments AS c')
	// 			->where('status','=','0')
	// 			->count();
	// 	return $query;
	// }

	public static function update_comment( $params ){
		$comment = TblComments::find($params['commentId']);

		if(isset($params['status']))
			$comment->status = $params['status'];

		try {
			$comment->save();
		}
		catch (QueryException $e){
			die($e);
		}
	}

	public static function insert_comments( $params ){
		$comments = new TblComments;
		#dd($params['post_id']);
		$comments->post_id = $params['post_id'];
		
		$comments->name = $params['name'];
		$comments->comment_content = $params['comment_content'];
		
		try{	
			$comments->save();
		}
		catch (QueryException $e){
			die($e);
		}
	}
}
