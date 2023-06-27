<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukuModel;

class Buku extends BaseController
{

    public function tambahBuku()
    {
        return view('buku/add');
    }

    public function tambahBukuAction()
    {
        //validasi
        $validation = \Config\Services::validation();
        //mengatur rules untuk validasi dan custom message untuk error
        $validation->setRules([
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'jumlah_halaman' => 'required',
            'sinopsis' => 'required',

        ], [
            'judul' => [
                'required' => 'Nama harus diisi.'
            ],
            'pengarang' => [
                'required' => 'Alamat harus diisi.'
            ],
            'penerbit' => [
                'required' => 'Email harus diisi.',

            ],
            'tahun_terbit' => [
                'required' => 'Email harus diisi.',

            ],
            'jumlah_halaman' => [
                'required' => 'Email harus diisi.',

            ],
            'sinopsis' => [
                'required' => 'Email harus diisi.',

            ],

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
        $buku = new BukuModel();
        $buku->insert([
            'judul' => $this->request->getPost('judul'),
            'pengarang' => $this->request->getPost('pengarang'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
            'jumlah_halaman' => $this->request->getPost('jumlah_halaman'),
            'sinopsis' => $this->request->getPost('sinopsis'),
        ]);

        //mengambil data anggota yang baru saja disimpan
        $buku = $buku->where('id', $buku->insertID())->first();

        //mengembalikan nilai berupa json
        $data = [
            'success' => TRUE,
            'message' => 'Berhasil Menambahkan Buku',
            'data' => $buku
        ];
        return $this->response->setStatusCode(200)->setJSON($data);
    }
    public function hapusBuku($id)
    {
        $buku = new BukuModel();
        $buku->where('id', $id);
        $buku->delete();
        return redirect()->to('buku');
    }
}
