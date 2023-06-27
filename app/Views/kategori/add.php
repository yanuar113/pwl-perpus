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
    <p>Ini adalah halaman tambah kategori perpustakaan.</p>
    <form method="post" id="form-tambah-kategori">
        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" name="nama_kategori" id="nama_kategori" />
        </div>
        <div class="form-group">
            <label for="deskripsi_kategori">Deskripsi Kategori</label>
            <textarea name="deskripsi_kategori" rows="5"></textarea>
        </div>
        <input class="btn btn-green" type="submit" value="Tambah kategori" />
        <a href="<?= base_url('kategori') ?>" class="btn btn-red">Gak Jadi</a>
    </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        //find a href with id="anggota" in li then add class active in li
        $('li a#kategori').parent().addClass('active');
        document.title = "kategori"

        //ketika form tambah anggota di submit
        $('#form-tambah-kategori').submit(function(e) {
            e.preventDefault();
            //ambil url dari form action
            let url = "<?= base_url('kategori/tambah') ?>";
            //ambil data dari form
            let data = $(this).serialize();
            //kirim data ke url dengan method post
            $.post(url, data, function(data) {
                //jika data yang dikirim dari url sukses maka tampilkan pesan sukses
                if (data.success) {
                    $('#form-tambah-kategori').trigger("reset");
                    Swal.fire(
                        'Good job!',
                        data?.message,
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "<?= base_url('kategori') ?>";
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