<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblComments extends Model {

	public static function get_comments(){
		$query = \DB::table('comments AS c')
				->leftJoin('posts AS p', 'p.id', '=', 'c.post_id')
				->get();
		return $query;
	}

	public static function get_displayed_comments(){
		$query = \DB::table('comments AS c')
				->where('status','=','1')
				->count();
		return $query;
	}

	public static function get_hidden_comments(){
		$query = \DB::table('comments AS c')
				->where('status','=','0')
				->count();
		return $query;
	}

	public static function update_comment( $params ){
		$comments = TblPosts::find($params['commentId']);

		if(isset($params['status']))
			$comments->status = $params['status'];

		try {
			$comments->save();
			//die('successfully updated account');
		}
		catch (QueryException $e) 
		{
			die($e);
		}
	}
}
