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
    <p>Ini adalah halaman anggota perpustakaan.</p>
    <a class="btn btn-black" href="anggota/tambah" id="btn-tambah-anggota">Tambah Anggota</a>
    <br />
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1;
        foreach ($anggotas as $row) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td><?= $row['telepon'] ?></td>
                <td>
                    <a class="btn btn-yellow" href="anggota/edit/<?= $row['id'] ?>">Edit</a>
                    <a class="btn btn-red" href="anggota/delete/<?= $row['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
<?= $this->endSection() ?>

1. Bikin Model Anggota
2. Bikin Controller Anggota
3. Bikin View Anggota
4. Bikin Route Anggota