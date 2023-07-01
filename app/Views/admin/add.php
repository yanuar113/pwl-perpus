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
    <p>Ini adalah halaman tambah admin perpustakaan.</p>
    <form method="post" id="form-tambah-admin">
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="nama" id="nama" />
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" />
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" />
        </div>
        <input class="btn btn-green" type="submit" value="Tambah Admin" />
        <a href="<?= base_url('admin') ?>" class="btn btn-red">Gak Jadi</a>
    </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        //find a href with id="anggota" in li then add class active in li
        $('li a#admin').parent().addClass('active');
        document.title = "Admin"

        //ketika form tambah anggota di submit
        $('#form-tambah-admin').submit(function(e) {
            e.preventDefault();
            //ambil url dari form action
            let url = "<?= base_url('admin/tambah') ?>";
            //ambil data dari form
            let data = $(this).serialize();
            //kirim data ke url dengan method post
            $.post(url, data, function(data) {
                //jika data yang dikirim dari url sukses maka tampilkan pesan sukses
                if (data.success) {
                    $('#form-tambah-admin').trigger("reset");
                    Swal.fire(
                        'Good job!',
                        data?.message,
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "<?= base_url('admin') ?>";
                        }
                    })
                } else {
                    Swal.fire(
                        'Oops!',
                        data?.message,
                        'error'
                    )
                }
            })
        })
    })
</script>
<?= $this->endSection() ?>