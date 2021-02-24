<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	public function testEmail()
	{
		$email = service('email');
		$email->setTo('sujanstha2052@gmail.com');
		$email->setSubject('A test email');
		$email->setMessage('<h1>Hello wrold</h1>');

		if($email->send()) {
			echo "message sent";
		} else {
			echo $email->printDebugger();
		}
	}
}
