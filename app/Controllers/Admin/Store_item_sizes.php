<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Store_item_size;
use App\Models\StoreItemSizeModel;


class Store_item_sizes extends BaseController
{
	public function update($store_item_id = null)
	{
		if(is_null($store_item_id)) {
			show_404();
		}

		if(!empty($_POST)) {
			$store_item_size = new Store_item_size($this->request->getPost());
			$store_item_size->item_id = $store_item_id;
			$model = new StoreItemSizeModel();

			if ($model->insert($store_item_size)) {
				return redirect()->to('/admin/store_item_sizes/update/' . $store_item_id)
				->with('success', 'Store Item Colour Created Successfully!!');
			} else {
				return redirect()->back()
				->withInput()
				->with('error', $model->errors());
			}
		}


		$model = new StoreItemSizeModel;
		$store_item_sizes = $model->findAll();


		$data = array(
			"page_title" => "Update Item Sizes",
			"store_item_id" => $store_item_id,
			"store_item_sizes" => $store_item_sizes
		);

		return view('admin/store_item_sizes/update', $data);
	}

	public function delete($id = null)
	{
		if(is_null($id)) {
			show_404();
		}

		$model = new StoreItemSizeModel();
		$store_item_size = $model->find($id);
		$store_item_id = $store_item_size->item_id;

		$model->delete($id);

		return redirect()->to('/admin/store_item_sizes/update/' . $store_item_id)->with('success', 'Store Item Colour Deleted!!');
	}
}