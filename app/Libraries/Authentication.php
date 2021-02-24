<?php

namespace App\Libraries;

class Authentication
{
	private $user;

	public function login($email, $password)
	{
		$model = new \App\Models\UserModel;
		$user = $model->findByEmail($email);
		$session = session();

		if($user === null) {
			$session->setFlashdata('error', 'Invalid Credentials!!');
			return false;
		}

		if(!$user->verifyPassword($password)) {
			$session->setFlashdata('error', 'Invalid Credentials!!');
			return false;
		}

		if($user->verification_code != '') { 
			$session->setFlashdata('warning', 'Please verify your account first!!');
			return false;
		}

		if($user->status != 'active') {
			$session->setFlashdata('warning', 'Your account is blocked. Please Contact Us For More detail!!');
		}

		$session->regenerate();
		$session->set('user_id', $user->id);
		return true;
	}

	public function logout()
	{
		session()->destroy();
	}

	public function getCurrentUser()
	{
		if(!$this->isLoggedIn()) {
			return null;
		}

		if($this->user === null) {
			$model = new \App\Models\UserModel;
			$this->user = $model->find(session()->get('user_id'));
		}
		return $this->user;
	}

	public function isLoggedIn()
	{
		return session()->has('user_id');
	}
}