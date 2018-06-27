<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblPosts extends Model {

	public static function get_posts(){
		$query = \DB::table('posts AS p')
				->select('p.title','p.content')
				->where('status','=','1')
				->get();
		return $query;
	}

	public static function posts_info(){
		$query =\DB::table('posts AS p')
				->leftJoin('accounts AS a', 'a.acc_id', '=', 'p.acc_id')
				->select('p.post_acc_id', 'p.title', 'a.username', 'p.date_published', 'p.status')
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
}
