<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;
use App\Models\BukuModel;
use App\Models\PeminjamanModel;

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
        return view('kategori/index');
    }
    public function peminjaman()
    {
        $peminjamanModel = new PeminjamanModel();
        //join table anggota dan buku
        $peminjamans = $peminjamanModel->join('anggota', 'anggota.id = peminjaman.id_anggota')->join('buku', 'buku.id = peminjaman.id_buku')
            ->select('peminjaman.*, anggota.nama, buku.judul')->findAll();
        return view('peminjaman/index', compact('peminjamans'));
    }
    public function pengembalian()
    {
        return view('pengembalian/index');
    }
}
