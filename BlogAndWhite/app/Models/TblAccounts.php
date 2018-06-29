<?php namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use App\User as Authenticatable;

class TblAccounts extends Authenticatable {

	protected $table='users';
	public $timestamps = false;
	public static function get_accounts()
	{
		$query = \DB::table('users AS a')
				->get();
		return $query;
	}

	public static function get_enabled_accounts()
	{
		$query = \DB::table('users AS a')
				->where('status','=','1')
				->count();
		return $query;
	}	

	public static function get_disabled_accounts()
	{
		$query = \DB::table('users AS a')
				->where('status','=','0')
				->count();
		return $query;
	}

	public static function update_account( $params ){
		$account = TblAccounts::find($params['accId']);

		if(isset($params['status']))
			$account->status = $params['status'];

		try {
			$account->save();
			//die('successfully updated account');
		}
		catch (QueryException $e) 
		{
			die($e);
		}
	}

	public static function get_account_type( $params ){
		$query = \DB::table('users AS a')
			   ->select('a.acc_type')
			   ->where('username','=',$params['username'])
			   ->first();

		// $type =  $query['acc_type'];
		return $query->acc_type;
	}

	public static function add_account( $params ){
		$id = DB::table('users')->insert(
			['username' => $params['username'], 'password' => bcrypt($params['password']), 'email' => $params['email'] ]
		);
	}

	public static function username_checker($username) {
		$query = \DB::table('users AS a')
				->where('username','=', $username)
				->get();
		return $query;
	}
}
