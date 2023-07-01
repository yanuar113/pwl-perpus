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
<p>Ini adalah halaman admin perpustakaan.</p>
    <a class="btn btn-green" href="admin/tambah" id="btn-tambah-admin">Tambah Admin</a>
    <br />
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>email</th>
            
            <th>Aksi</th>
        </tr>
        <?php $no = 1;
        foreach ($admins as $row) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['email'] ?></td>
                <td>
                    <a class="btn btn-yellow" href="admin/edit/<?= $row['id'] ?>">Edit</a>
                    <a class="btn btn-red" href="admin/delete/<?= $row['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $('li a#admin').parent().addClass('active');
    document.title = "Admin"
</script>
</div>
<?= $this->endSection() ?>