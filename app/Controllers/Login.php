<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        // view login
        return view('login');
    }

    public function authenticate()
    {
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            # code...
            return redirect()->to('/login')->with('eror', 'email tidak ditemukan');
        }
        if (!password_verify($password, $user['password'])) {
            # code...
            return redirect()->to('/login')->with('eror', 'password salah!');
        }
        session()->set([
            'user_id' => $user['id'],
            'email' => $user['email'],
            'logged_in' => true
        ]);
        return redirect()->to('/dashboard');
    }

    public function authenticateApi()
    {
        $userModel = new UserModel();
        $obj = file_get_contents('php://input');
        $data = json_decode($obj);
        $email = $data->email;
        $password = $data->password;

        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            $data = [
                'success' => FALSE,
                'message' => 'User tidak ditemukan',
                'data' => []
            ];
            return $this->response->setStatusCode(404)->setJSON($data);
        }
        if (!password_verify($password, $user['password'])) {
            $data = [
                'success' => FALSE,
                'message' => 'Password salah',
                'data' => []
            ];
            return $this->response->setStatusCode(404)->setJSON($data);
        }
        session()->set([
            'user_id' => $user['id'],
            'email' => $user['email'],
            'logged_in' => true
        ]);
        $data = [
            'success' => TRUE,
            'message' => 'Berhasil Login',
            'data' => $user
        ];
        return $this->response->setStatusCode(200)->setJSON($data);
    }
}
