<?php

namespace App\Entities;

class User extends \CodeIgniter\Entity
{
	public function verifyPassword($password)
	{
		return password_verify($password, $this->password);
	}

	public function startVerification()
	{
		$this->token = bin2hex(random_bytes(16));
		$this->verification_code = hash_hmac('sha256', $this->token, $_ENV['HASH_SECRET_KEY']);
	}

	public function activate()
	{
		$this->status = 'active';
		$this->verification_code = null;
	}
}