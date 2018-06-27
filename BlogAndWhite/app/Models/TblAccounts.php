<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblAccounts extends Model {

	protected $table='accounts';
	public $timestamps = false;
	public static function get_accounts()
	{
		$query = \DB::table('accounts AS a')
				->get();
		return $query;
	}

	public static function get_enabled_accounts()
	{
		$query = \DB::table('accounts AS a')
				->where('status','=','1')
				->count();
		return $query;
	}	

	public static function get_disabled_accounts()
	{
		$query = \DB::table('accounts AS a')
				->where('status','=','0')
				->count();
		return $query;
	}

	public static function update_account( $params ){
		$account = TblAccounts::find($params['accId']);

		// if(isset($params['status']))
			$account->status = $params['status'];

		try {
			$account->save();
			die('successfully updated account');
		}
		catch (QueryException $e) 
		{
			die($e);
		}
	}


}
