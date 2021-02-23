<?php 

namespace App\Models;
use CodeIgniter\Model;

class CategoryModel extends Model
{
	protected $table = 'store_categories';
	protected $allowedFields = [
		'cat_title',
		'cat_url',
		'parent_cat_id',
		'priority'
	];
	protected $returnType = 'App\Entities\Category';
	protected $useTimestamps = false;
	protected $validationRules = [
		'cat_title' => 'required',
		//'last_name' => 'required',
	];

	protected $beforeInsert = ['generateSlug'];
	protected $beforeUpdate = ['generateSlug'];

	protected function generateSlug(array $data)
	{
		if(isset($data['data']['cat_title'])) {
			$data['data']['cat_url'] = url_title(strtolower($data['data']['cat_title']));
		}
		return $data;
	}

	public function findBySlug($slug)
	{
		return $this->where('cat_url', $slug)->first();
	}
}