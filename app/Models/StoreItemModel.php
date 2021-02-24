<?php 

namespace App\Models;
use CodeIgniter\Model;

class StoreItemModel extends Model
{
	protected $table = 'store_items';
	protected $allowedFields = [
		'item_title',
		'item_url',
		'item_price',
		'item_description',
		'was_price',
		'big_pic',
		'small_pic',
		'status'
	];
	protected $returnType = 'App\Entities\Category';
	protected $useTimestamps = true;
	protected $validationRules = [
		'item_title' => 'required',
		'item_price' => 'required',
	];

	protected $beforeInsert = ['generateSlug'];
	protected $beforeUpdate = ['generateSlug'];

	protected function generateSlug(array $data)
	{
		if(isset($data['data']['item_title'])) {
			$data['data']['item_url'] = url_title(strtolower($data['data']['item_title']));
		}
		return $data;
	}

	public function findBySlug($slug)
	{
		return $this->where('item_url', $slug)->first();
	}

	public function getStoreImage($id, $type = "small_pic")
	{
		$store_item = $this->where("id", $id)->first();
		if($store_item->{$type} == '') {
			show_404();
		}

		$path = WRITEPATH . 'uploads/store_items/' . $type .'/' . $store_item->{$type};

		$finfo = new \finfo(FILEINFO_MIME);
		$type = $finfo->file($path);

		header("Content-Type: $type");
		header("Content-Length: " . filesize($path));
		readfile($path);
		exit;
	}
}