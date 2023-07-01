<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;


class Admin extends BaseController
{
    public function tambahAdmin()
    {
        return view('admin/add');   
    }
    public function tambahAdminAction()
    {
        //validasi
        $validation = \Config\Services::validation();
        //mengatur rules untuk validasi dan custom message untuk error
        $validation->setRules([
            'nama' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required'
        ], [
            'nama' => [
                'required' => 'Nama harus diisi.'
            ],
            'email' => [
                'required' => 'Email harus diisi.',
                'valid_email' => 'Email tidak valid.'
            ],
            'password' => [
                'required' => 'Telepon harus diisi.',
               
            ]
        ]);

        //mengecek validasi dan jika validasi gagal maka akan menampilkan pesan error
        if (!$validation->withRequest($this->request)->run()) {
            $data = [
                'success' => FALSE,
                'message' => $validation->listErrors(),
                'data' => []
            ];
            return $this->response->setStatusCode(200)->setJSON($data);
        }

        //jika validasi berhasil maka akan menyimpan data ke database
        $admin = new AdminModel();
        $admin->insert([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ]);

        //mengambil data anggota yang baru saja disimpan
        $admin = $admin->where('id', $admin->insertID())->first();

        //mengembalikan nilai berupa json
        $data = [
            'success' => TRUE,
            'message' => 'Berhasil Meenambahkan Admin',
            'data' => $admin
        ];
        return $this->response->setStatusCode(200)->setJSON($data);
    }
    public function hapusAdmin($id) {
        $admin = new AdminModel();
        $admin->where('id', $id);
        $admin->delete();
        return redirect()->to('admin');
    }
    
}
