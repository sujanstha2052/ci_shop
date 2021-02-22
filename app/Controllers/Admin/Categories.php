<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Entities\Category;
use App\Models\CategoryModel;

class Categories extends BaseController
{
	public function index()
	{
		return view('admin/categories/index');
	}

	public function create()
	{
		if(!empty($_POST)) {
			$category = new Category($this->request->getPost());
			$model = new CategoryModel;

			if($model->insert($category)) {
				echo "true";
			} else {
				echo "false";
				displayArr($model->errors());
			}
			die;
		}
		return view('admin/categories/create');
	}
}
