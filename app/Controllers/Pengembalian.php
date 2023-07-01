<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PeminjamanModel;
use App\Models\PengembalianModel;

class Pengembalian extends BaseController
{
    public function tambahPengembalian()
    {
        $peminjamanModel = new PeminjamanModel();
        $peminjamans = $peminjamanModel->join('anggota', 'anggota.id = peminjaman.id_anggota')
            ->join('buku', 'buku.id = peminjaman.id')
            ->select('peminjaman.*, buku.judul, anggota.nama')
            ->findAll();
        return view('pengembalian/add', compact('peminjamans'));
    }

    public function tambahPengembalianAction()
    {
        //validasi
        $validation = \Config\Services::validation();
        //mengatur rules untuk validasi dan custom message untuk error
        $validation->setRules([
            'id_peminjaman' => 'required',
            'tanggal_pengembalian' => 'required',
            'denda' => 'required',

        ], [
            'id_peminjaman' => [
                'required' => 'Peminjaman harus diisi.'
            ], 
            'tanggal_pengembalian' => [
                'required' => 'Tanggal Pengembalian harus diisi.'
            ],
            'denda' => [
                'required' => 'Denda harus diisi.'
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
        $pengembalian = new PengembalianModel();
        $pengembalian->insert([
            'id_peminjaman' => $this->request->getPost('id_peminjaman'),
            'tanggal_pengembalian' => $this->request->getPost('tanggal_pengembalian'),
            'denda' => $this->request->getPost('denda'),
        ]);

        //mengambil data anggota yang baru saja disimpan
        $pengembalian = $pengembalian->where('id', $pengembalian->insertID())->first();

        //mengembalikan nilai berupa json
        $data = [
            'success' => TRUE,
            'message' => 'Berhasil Menambahkan Pengembalian',
            'data' => $pengembalian
        ];
        return $this->response->setStatusCode(200)->setJSON($data);
    }

    public function hapusPengembalian($id)
    {
        $pengembalianModel = new PengembalianModel();
        $pengembalianModel->delete($id);
        return redirect()->to('/pengembalian');
    }
}
