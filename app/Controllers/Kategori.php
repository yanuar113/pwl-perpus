<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function tambahKategori()
    {
        return view('kategori/add');
    }

    public function tambahKategoriAction()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_kategori' => 'required',
            'deskripsi_kategori' => 'required',
        ], [
            'nama_kategori' => [
                'required' => 'Nama Kategori harus diisi.'
            ],
            'deskripsi_kategori' => [
                'required' => 'Deskripsi Kategori harus diisi.'
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            $data = [
                'success' => FALSE,
                'message' => $validation->listErrors(),
                'data' => []
            ];
            return $this->response->setJSON($data);
        }

        // simpan data ke database 
        $kategoriModel = new KategoriModel();
        $kategoriModel->insert([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'deskripsi_kategori' => $this->request->getPost('deskripsi_kategori'),
        ]);
        //mengambil data anggota yang baru saja disimpan
        $kategori = $kategoriModel->getInsertID();
        $data = [
            'success' => TRUE,
            'message' => 'Data berhasil disimpan.',
            'data' => $kategori
        ];
        return $this->response->setJSON($data);
    }

    public function hapusKategori($id)
    {
        $kategoriModel = new KategoriModel();
        $kategoriModel->where('id', $id)->delete();
        // $kategoriModel->delete($this->request->getPost('id'));

        return redirect()->to('/kategori');
    }
}
