<?php 

namespace App\Models;
use CodeIgniter\Model;

class StoreAccountModel extends Model
{
	protected $table = 'user_infos';
	protected $allowedFields = [
		'user_id',
		'address1',
		'address2',
		'town',
		'country',
		'post_code',
		'phone',
		'created_at'
	];
	protected $returnType = 'App\Entities\Store_account';
	protected $useTimestamps = true;
	protected $validationRules = [
		'address1' => 'required',
		'town' => 'required',
		'country' => 'required',
		'post_code' => 'required',
		'phone' => 'required',
	];

}