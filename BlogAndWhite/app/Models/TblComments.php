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

	// public static function get_displayed_comments(){
	// 	$query = \DB::table('comments AS c')
	// 			->where('status','=','1')
	// 			->count();
	// 	return $query;
	// }

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
		catch (QueryException $e) 
		{
			die($e);
		}
	}

	public static function insert_comments( $params ){
		$comments = new TblComments;
		#dd($params);
		$posts->name = $params['name'];
		$posts->comment_content = $params['comment_content'];
		$timestamps = true;
		$posts->date_commented = $params['date_commented'];
		try{	
			$posts->save();
		}
		catch (QueryException $e){
			die($e);
		}
	}


}
