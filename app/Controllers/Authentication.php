<?php

namespace App\Controllers;

use App\Entities\User;
use App\Models\UserModel;

class Authentication extends BaseController
{
    public function login()
    {
        if(!empty($_POST)) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $auth = service('auth');
            if($auth->login($email, $password)) {
                $redirect_url = session('redirect_url') ?? '/';
                unset($_SESSION['redirect_url']);
                return redirect()->to($redirect_url)
                ->with('info', 'Login Successful!!');
            } else {
                return redirect()->back()
                ->withInput()
                ->with('warning', "Invalid Login!!");
            }
        }
        return view('auth/login');
    }
    
    public function registration()
    {
        if(!empty($_POST)) {
            $user = new User($this->request->getPost());
            $model = new \App\Models\UserModel;
            if($model->insert($user)) {
                return redirect()->to('/register')
                ->with('info', 'Verification email sent to email. Please Verify to Login!!');
            } else {
                return redirect()->back()
                ->with('errors', $model->errors());
            }
        }

        return view('auth/register');
    }
    
    public function logout()
    {
        service('auth')->logout();
        return redirect()->to('/authentication/showLogoutMsg');
    }

    public function showLogoutMsg()
    {
        return redirect()->to('/')->with('info', 'Logout Successfully!!');
    }
}
