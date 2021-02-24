<?php 

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table = 'users';
	protected $allowedFields = [
		'first_name', 
		'last_name', 
		'email',
		'password',
		'photo',
		'status',
		'verification_code',
		'is_admin'
	];
	protected $returnType = 'App\Entities\User';
	protected $useTimestamps = true;
	protected $validationRules = [
		'first_name' => 'required',
		'last_name' => 'required',
		'email' => 'required|valid_email|is_unique[users.email]',
		'password' => 'required|min_length[6]',
		'confirm_password' => 'required|matches[password]'
	];

	protected $validationMessages = [
		'email' => [
			'is_unique' => 'That email address is taken!!'
		],
		'confirm_password' => [
			'required' => 'Please Confirm the password!!',
			'matches' => 'Please enter the same password again!!'
		]
	];



	protected $beforeInsert = ['hashPassword'];

	protected function hashPassword(array $data)
	{
		if(isset($data['data']['password'])) {
			$data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
		}
		return $data;
	}

	public function findByEmail($email)
	{
		return $this->where('email', $email)->first();
	}

	public function disablePasswordValidation()
	{
		unset($this->validationRules['password']);
		unset($this->validationRules['confirm_password']);
	}

	public function activateByToken($token)
	{
		$token_hash = hash_hmac('sha256', $token, $_ENV['HASH_SECRET_KEY']);
		$user = $this->where('verification_code', $token_hash)->first();

		if($user !== null) {
			$user->activate();
			$this->protect(false)->save($user);
		}
	}

}