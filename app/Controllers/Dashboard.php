<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;

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
        $anggotaModel = new AnggotaModel();
        $anggotas = $anggotaModel->findAll();
        return view('anggota/index', compact('anggotas'));
    }
    public function buku()
    {
        return view('buku/index');
    }
    public function kategori()
    {
        return view('kategori/index');
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
