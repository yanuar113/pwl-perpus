<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;
use App\Models\BukuModel;
use App\Models\PeminjamanModel;

class Peminjaman extends BaseController
{
    public function tambahPeminjaman()
    {
        $anggotaModel = new AnggotaModel();
        $anggotas = $anggotaModel->findAll();
        $bukuModel = new BukuModel();
        $bukus = $bukuModel->findAll();
        return view('peminjaman/add', compact('anggotas', 'bukus'));
    }

    public function tambahPeminjamanAction()
    {
        //validasi
        $validation = \Config\Services::validation();
        //mengatur rules untuk validasi dan custom message untuk error
        $validation->setRules([
            'id_anggota' => 'required',
            'id_buku' => 'required',
            'tanggal_peminjaman' => 'required',
            'tanggal_pengembalian' => 'required',

        ], [
            'id_anggota' => [
                'required' => 'Nama harus diisi.'
            ],
            'id_buku' => [
                'required' => 'Alamat harus diisi.'
            ],
            'tanggal_peminjaman' => [
                'required' => 'Tanggal peminjaman harus diisi.',

            ],
            'tanggal_pengembalian' => [
                'required' => 'Tanggal pengembalian harus diisi.',

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
        $peminjaman = new PeminjamanModel();
        $peminjaman->insert([
            'id_anggota' => $this->request->getPost('id_anggota'),
            'id_buku' => $this->request->getPost('id_buku'),
            'tanggal_peminjaman' => $this->request->getPost('tanggal_peminjaman'),
            'tanggal_pengembalian' => $this->request->getPost('tanggal_pengembalian'),
        ]);

        //mengambil data anggota yang baru saja disimpan
        $peminjaman = $peminjaman->where('id', $peminjaman->insertID())->first();

        //mengembalikan nilai berupa json
        $data = [
            'success' => TRUE,
            'message' => 'Berhasil Menambahkan Peminjaman',
            'data' => $peminjaman
        ];
        return $this->response->setStatusCode(200)->setJSON($data);
    }

    public function hapusPeminjaman($id)
    {
        $peminjamanModel = new PeminjamanModel();
        $peminjamanModel->delete($id);
        return redirect()->to('/peminjaman');
    }
}
