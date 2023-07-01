<?php helper(['my_helper']); ?>
<?= $this->extend('template/page_layout') ?>

<?= $this->section('content') ?>
<style>
    .content {
        max-width: 100%;
        padding: 0 2%;
        margin: 0 auto;
        box-sizing: border-box;
        background-color: lightgray;
    }

    h2 {
        font-size: 3vw;
        text-align: center;
    }

    p {
        font-size: 2vw;
        text-align: justify;
    }

    @media(max-width: 768px) {
        h2 {
            font-size: 4vw;
        }

        p {
            font-size: 3vw;
        }
    }
</style>

<div class="content">
    <p>Ini adalah halaman Pengembalian perpustakaan.</p>
    <a class="btn btn-green" href="pengembalian/tambah" id="btn-tambah-pengembalian">Tambah Pengembalian</a>
    <br />
    <table border="1">
        <tr>
            <th>No</th>
            <th>Anggota</th>
            <th>Judul Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Harus Kembali</th>
            <th>Tanggal Kembali</th>
            <th>Denda</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1;
        foreach ($pengembalians as $row) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['judul'] ?></td>
                <td><?= $row['tanggal_peminjaman'] ?></td>
                <td><?= $row['tanggal_harus_kembali'] ?></td>
                <td><?= $row['tanggal_pengembalian'] ?></td>
                <td><?= format_rupiah($row['denda']) ?></td>
                <td>
                    <a class="btn btn-yellow" href="pengembalian/edit/<?= $row['id'] ?>">Edit</a>
                    <a class="btn btn-red" href="pengembalian/delete/<?= $row['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $('li a#pengembalian').parent().addClass('active');
    document.title = "Pengembalian"
</script>
<?= $this->endSection() ?>