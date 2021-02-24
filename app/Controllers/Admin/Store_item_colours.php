<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Store_item_colour;
use App\Models\StoreItemColourModel;


class Store_item_colours extends BaseController
{
	public function update($store_item_id = null)
	{
		if(is_null($store_item_id)) {
			show_404();
		}

		if(!empty($_POST)) {
			$store_item_colour = new Store_item_colour($this->request->getPost());
			$store_item_colour->item_id = $store_item_id;
			$model = new StoreItemColourModel();

			if ($model->insert($store_item_colour)) {
				return redirect()->to('/admin/store_item_colours/update/' . $store_item_id)
				->with('success', 'Store Item Colour Created Successfully!!');
			} else {
				return redirect()->back()
				->withInput()
				->with('error', $model->errors());
			}
		}


		$model = new StoreItemColourModel;
		$store_item_colours = $model->findAll();


		$data = array(
			"page_title" => "Update Item Colours",
			"store_item_id" => $store_item_id,
			"store_item_colours" => $store_item_colours
		);

		return view('admin/store_item_colours/update', $data);
	}

	public function delete($id = null)
	{
		if(is_null($id)) {
			show_404();
		}

		$model = new StoreItemColourModel();
		$store_item_colour = $model->find($id);
		$store_item_id = $store_item_colour->item_id;

		$model->delete($id);

		return redirect()->to('/admin/store_item_colours/update/' . $store_item_id)->with('success', 'Store Item Colour Deleted!!');
	}
}