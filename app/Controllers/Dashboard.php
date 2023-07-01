<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;
use App\Models\BukuModel;
use App\Models\PeminjamanModel;
use App\Models\KategoriModel;
use App\Models\PengembalianModel;
use App\Models\AdminModel;

class Dashboard extends BaseController
{
    public function index()
    {   
        $anggota = new AnggotaModel();
        $jumlah_anggota = $anggota->countAllResults();
        $buku = new BukuModel();
        $jumlah_buku = $buku->countAllResults();
        $peminjaman = new PeminjamanModel();
        $jumlah_peminjaman = $peminjaman->countAllResults();

        return view('dashboard/index',compact('jumlah_anggota', 'jumlah_buku', 'jumlah_peminjaman'));
       
    }

    public function admin()
    {
        $adminModel = new AdminModel();
        $admins = $adminModel->findAll();
        return view('admin/index', compact('admins'));
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
        $peminjamanModel = new PeminjamanModel();
        //join table anggota dan buku
        $peminjamans = $peminjamanModel->join('anggota', 'anggota.id = peminjaman.id_anggota')->join('buku', 'buku.id = peminjaman.id_buku')
            ->select('peminjaman.*, anggota.nama, buku.judul')->findAll();
        return view('peminjaman/index', compact('peminjamans'));
    }
    public function pengembalian()
    {
        $pengembalianModel = new PengembalianModel();
        $pengembalians = $pengembalianModel->join('peminjaman', 'pengembalian.id_peminjaman = peminjaman.id')
        ->join('anggota', 'anggota.id = peminjaman.id_anggota')
        ->join('buku', 'buku.id = peminjaman.id')
        ->select('pengembalian.*, buku.judul, anggota.nama, peminjaman.tanggal_peminjaman, peminjaman.tanggal_pengembalian as tanggal_harus_kembali')
        ->findAll();
        return view('pengembalian/index', compact('pengembalians'));
    }
}
