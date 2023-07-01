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

    <p>Ini adalah halaman kategori perpustakaan.</p>
    <a class="btn btn-green" href="kategori/tambah" id="btn-tambah-kategori">Tambah Kategori</a>
    <br />
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Deskripsi Kategori</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1;
        foreach ($kategoris as $row) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama_kategori'] ?></td>
                <td><?= $row['deskripsi_kategori'] ?></td>
                <td>
                    <a class="btn btn-yellow" href="kategori/edit/<?= $row['id'] ?>">Edit</a>
                    <a class="btn btn-red" href="kategori/delete/<?= $row['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $('li a#kategori').parent().addClass('active');
    document.title = "Kategori"
</script>
<?= $this->endSection() ?>