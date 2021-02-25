<?php

namespace App\Controllers;

use App\Models\StoreItemModel;

class Products extends BaseController
{
	public function index($slug = null)
	{
		if(is_null($slug)) {
			show_404();
		}

		$model = new StoreItemModel();
		$store_item = $model->findBySlug($slug);

		$data['page_title'] = $store_item->item_title;
		$data['store_item'] = $store_item;
		$data['add_to_cart'] = $this->add_to_cart($store_item->id);

		return view('front/products/view', $data);
	}

	private function add_to_cart($store_item_id = null)
	{
		if(is_null($store_item_id)) {
			return false;
		}

		$model = new StoreItemModel();
		$data['store_item_colours'] = $model->getAllColours($store_item_id);
		$data['store_item_sizes'] = $model->getAllSizes($store_item_id);
		$data['store_item_id'] = $store_item_id;

		return view('front/products/add_to_cart', $data);
	}


	// === === === === === === === === === === === === === === === === 
	// Not changeable functions
	// === === === === === === === === === === === === === === === === 

	public function image($id = null, $type = 'small_pic')
	{
		if(is_null($id)) {
			show_404();
		}
		$model = new StoreItemModel();
		$model->getStoreImage($id, $type);
	}
}