<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $sessionData = [
                'id_pengguna'  => $user['id_pengguna'],
                'username'     => $user['username'],
                'nama_depan'   => $user['nama_depan'],
                'role'         => $user['role'],
                'isLoggedIn'   => TRUE
            ];
            $this->session->set($sessionData);

            if ($user['role'] == 'Admin') {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/public/dashboard');
            }
        } else {
            $this->session->setFlashdata('error', 'Username atau Password salah!');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $this->session->destroy(); 
        return redirect()->to('/login');
    }
}