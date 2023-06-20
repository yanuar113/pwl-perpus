<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;

class Anggota extends BaseController
{
    public function tambahAnggota()
    {
        return view('anggota/add');
    }

    public function tambahAnggotaAction()
    {
        //validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|valid_email',
            'telepon' => 'required|numeric'
        ], [
            'nama' => [
                'required' => 'Nama harus diisi.'
            ],
            'alamat' => [
                'required' => 'Alamat harus diisi.'
            ],
            'email' => [
                'required' => 'Email harus diisi.',
                'valid_email' => 'Email tidak valid.'
            ],
            'telepon' => [
                'required' => 'Telepon harus diisi.',
                'numeric' => 'Telepon harus berupa angka.'
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            $data = [
                'success' => FALSE,
                'message' => $validation->listErrors(),
                'data' => []
            ];
            return $this->response->setStatusCode(200)->setJSON($data);
        }

        $anggota = new AnggotaModel();
        $anggota->insert([
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'telepon' => $this->request->getPost('telepon')
        ]);

        $anggota = $anggota->where('id', $anggota->insertID())->first();

        $data = [
            'success' => TRUE,
            'message' => 'Berhasil Meenambahkan Anggota',
            'data' => $anggota
        ];
        return $this->response->setStatusCode(200)->setJSON($data);
    }
}
