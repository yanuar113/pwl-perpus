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
    <p>Ini adalah halaman Buku perpustakaan.</p>
    <a class="btn btn-green" href="buku/tambah" id="btn-tambah-buku">Tambah Buku</a>
    <br />
    <table border="1">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Jumlah halaman</th>
            <th>Sinopsis</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1;
        foreach ($bukus as $row) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['judul'] ?></td>
                <td><?= $row['pengarang'] ?></td>
                <td><?= $row['penerbit'] ?></td>
                <td><?= $row['tahun_terbit'] ?></td>
                <td><?= $row['jumlah_halaman'] ?></td>
                <td><?= $row['sinopsis'] ?></td>
                <td>
                    <a class="btn btn-yellow" href="buku/edit/<?= $row['id'] ?>">Edit</a>
                    <a class="btn btn-red" href="buku/delete/<?= $row['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $('li a#buku').parent().addClass('active');
    document.title = "Buku"
</script>
<?= $this->endSection() ?>