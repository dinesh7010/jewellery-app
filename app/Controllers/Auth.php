<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginPost()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();
        if ($user && password_verify($password, $user['password'])) {
            $session->set('user_id', $user['id']);
            $session->setFlashdata('success', 'Logged in successfully!');
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid login credentials');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function signup()
    {
        return view('auth/signup');
    }

    public function register()
    {
        $session = session();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $password_confirm = $this->request->getPost('password_confirm');

        if ($password !== $password_confirm) {
            $session->setFlashdata('error', 'Passwords do not match.');
            return redirect()->back();
        }

        $userModel = new \App\Models\UserModel();

        // Check if email already exists
        if ($userModel->where('email', $email)->first()) {
            $session->setFlashdata('error', 'Email already registered.');
            return redirect()->back();
        }

        $userModel->save([
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        $session->setFlashdata('success', 'Signup successful. Please login.');
        return redirect()->to('/login');
    }

}
