<?php

namespace App\Controllers\Admin;

use App\Entities\User;
// use App\Models\UserModel;
use App\Entities\Store_account;
use App\Models\StoreAccountModel;
use App\Controllers\BaseController;

class Store_accounts extends BaseController
{
	public function manage()
	{
		$data['page_title'] = "Manage Store Accounts";
		return view('admin/store_accounts/manage', $data);
	}

	public function create()
	{
		if(!empty($_POST)) {
			// $user = new User($this->request->getPost());
			$user_model = new \App\Models\UserModel();
			$data['first_name'] = $this->request->getPost('first_name');
			$data['last_name'] = $this->request->getPost('last_name');
			$data['email'] = $this->request->getPost('email');
			$data['password'] = $this->request->getPost('password');
			$data['status'] = 'inactive';
			$data['is_admin'] = 0;

			$user_model->save($data);

			displayArr($user_model->insertID);


			die;

			$store_account = new Store_account($this->request->getPost());
			$store_model = new StoreAccountModel();
			$store_account->user_id = $user_model->insertID;

			$store_model->insert($store_account);


			// echo "<pre>";
			// displayArr($store_account);
			// displayArr($user);

			// echo "</pre>";
			die;

		}

		$data['page_title'] = "Add Store Account";
		return view('admin/store_accounts/create', $data);
	}
}