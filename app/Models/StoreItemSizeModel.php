<?php 

namespace App\Models;
use CodeIgniter\Model;

class StoreItemSizeModel extends Model
{
	protected $table = 'store_item_sizes';
	protected $allowedFields = [
		'item_id',
		'size',
	];
	protected $returnType = 'App\Entities\Store_item_size';
	protected $useTimestamps = false;
	protected $validationRules = [
		'item_id' => 'required',
		'size' => 'required',
	];

	public function deleteByItemId($item_id)
	{
		$this->where("item_id", $item_id)->delete();
	}
}