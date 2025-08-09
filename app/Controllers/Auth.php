<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $session;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->session = session();
    }

    public function login()
    {
        return view('templates/header', ['title' => 'Login'])
             . view('auth/login')
             . view('templates/footer');
    }

    public function doLogin()
    {
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $this->session->set('user_id', $user['id']);
            $this->session->set('username', $user['username']);
            return redirect()->to('/expenses');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function register()
    {
        return view('templates/header', ['title' => 'Register'])
             . view('auth/register')
             . view('templates/footer');
    }

    public function doRegister()
    {
        $model = new UserModel();

        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];

        // Check if username already exists
        if ($model->where('username', $data['username'])->first()) {
            return redirect()->back()->with('error', 'Username already exists');
        }

        $model->insert($data);

        return redirect()->to('/login')->with('success', 'Registration successful. Please login.');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}
