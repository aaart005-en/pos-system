<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new UserModel();
        $user = $model->where('username', $username)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return view('auth/login', [
                'error' => 'Invalid username or password.',
            ]);
        }

        session()->set([
            'isLoggedIn' => true,
            'user_id'    => $user['id'],
            'username'   => $user['username'],
        ]);

        return redirect()->to('/customers');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}