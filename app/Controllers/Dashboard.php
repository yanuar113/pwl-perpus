<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;
use App\Models\BukuModel;
use App\Models\KategoriModel;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('dashboard/index');
    }

    public function admin()
    {
        return view('admin/index');
    }
    public function anggota()
    {
        //memanggil model anggota
        $anggotaModel = new AnggotaModel();
        //mengambil seluruh data dari tabel anggota
        $anggotas = $anggotaModel->findAll();
        //mengirim data ke view
        return view('anggota/index', compact('anggotas'));
    }
    public function buku()
    {
         //memanggil model anggota
         $bukuModel = new BukuModel();
         //mengambil seluruh data dari tabel anggota
         $bukus = $bukuModel->findAll();
         //mengirim data ke view
         return view('buku/index', compact('bukus'));
    }
    public function kategori()
    {
        $kategoriModel = new KategoriModel();
        $kategoris = $kategoriModel->findAll();
        return view('kategori/index', compact('kategoris'));
    }
    public function peminjaman()
    {
        return view('peminjaman/index');
    }
    public function pengembalian()
    {
        return view('pengembalian/index');
    }
}
