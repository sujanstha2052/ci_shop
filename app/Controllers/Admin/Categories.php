<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Entities\Category;
use App\Models\CategoryModel;

class Categories extends BaseController
{
	public function manage()
	{
		$model = new CategoryModel();
		$data = [
			'page_title' => 'Manage Category',
			'categories' => $model->paginate(2),
			'pager'		 => $model->pager
		];


		return view('admin/categories/index', $data);
	}

	public function create()
	{
		if(!empty($_POST)) {
			$category = new Category($this->request->getPost());
			$model = new CategoryModel;

			if($model->insert($category)) {
				return redirect()->to('/admin/categories/manage')
				->with('success', 'Category Created Successfully!!');
			} else {
				return redirect()->back()
				->withInput()
				->with('error', $model->errors());
				// displayArr($model->errors());
			}
			// die;
		}
		return view('admin/categories/create');
	}

	public function edit($id = null)
	{
		$model = new CategoryModel;
		if(!empty($_POST)) {
			$category = new Category($this->request->getPost());
			if($model->update($id, $category)) {
				return redirect()->to('/admin/categories/manage')
				->with('success', 'Category Updated Successfully!!');
			} else {
				return redirect()->back()
				->withInput()
				->with('error', $model->errors());
				// displayArr($model->errors());
			}
		}

		$data['category'] = $model->find($id);
		return view('admin/categories/edit', $data);
	}
}
