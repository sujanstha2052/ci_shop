<?php 

namespace App\Models;
use CodeIgniter\Model;

class StoreItemColourModel extends Model
{
	protected $table = 'store_item_colours';
	protected $allowedFields = [
		'item_id',
		'colour',
	];
	protected $returnType = 'App\Entities\Store_item_colour';
	protected $useTimestamps = false;
	protected $validationRules = [
		'item_id' => 'required',
		'colour' => 'required',
	];
}