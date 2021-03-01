<?php

namespace App\Controllers\Admin;

use App\Entities\User;
use App\Models\UserModel;
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
			$db = db_connect();


			$db->transStart();
			try {
				$user = new User($this->request->getPost());
				$user_model = new \App\Models\UserModel();
				$user_model->disablePasswordValidation();
				$store_account = new Store_account($this->request->getPost());
				$store_model = new StoreAccountModel();

				$user->status = 'active';
				$user_model->insert($user);

				$store_account->user_id = $user_model->insertID;

				$store_model->insert($store_account);
				$db->transCommit();
				return redirect()->to('/admin/store_accounts/manage/')->with('success', 'Store account created Successfully!!');
			} catch (Exception $e) {
				$db->transRollback();

				return redirect()->back()->withInput()->with('errors', [$user_model->errors(), $store_model->errors()]);
			}

		}

		$data['page_title'] = "Add Store Account";
		return view('admin/store_accounts/create', $data);
	}
}