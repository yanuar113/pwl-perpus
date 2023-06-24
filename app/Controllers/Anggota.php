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
        //mengatur rules untuk validasi dan custom message untuk error
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
        $anggota = new AnggotaModel();
        $anggota->insert([
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'telepon' => $this->request->getPost('telepon')
        ]);

        //mengambil data anggota yang baru saja disimpan
        $anggota = $anggota->where('id', $anggota->insertID())->first();

        //mengembalikan nilai berupa json
        $data = [
            'success' => TRUE,
            'message' => 'Berhasil Meenambahkan Anggota',
            'data' => $anggota
        ];
        return $this->response->setStatusCode(200)->setJSON($data);

    }
    public function hapusAnggota($id) {
        $anggota = new AnggotaModel();
        $anggota->where('id', $id);
        $anggota->delete();
        return redirect()->to('anggota');
    }
}
