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
    <p>Ini adalah halaman Peminjaman perpustakaan.</p>
    <a class="btn btn-green" href="peminjaman/tambah" id="btn-tambah-peminjaman">Tambah Peminjaman</a>
    <br />
    <table border="1">
        <tr>
            <th>No</th>
            <th>Anggota</th>
            <th>Judul Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1;
        foreach ($peminjamans as $row) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['judul'] ?></td>
                <td><?= $row['tanggal_peminjaman'] ?></td>
                <td><?= $row['tanggal_pengembalian'] ?></td>
                <td>
                    <a class="btn btn-yellow" href="peminjaman/edit/<?= $row['id'] ?>">Edit</a>
                    <a class="btn btn-red" href="peminjaman/delete/<?= $row['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $('li a#peminjaman').parent().addClass('active');
    document.title = "Peminjaman"
</script>
<?= $this->endSection() ?>