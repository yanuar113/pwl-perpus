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
    <p>Ini adalah halaman tambah buku perpustakaan.</p>
    <form method="post" id="form-tambah-buku">
        <div class="form-group">
            <label for="jul">Judul</label>
            <input type="text" name="judul" id="judul" />
        </div>
        <div class="form-group">
            <label for="sinopsis">Sinopsis</label>
            <textarea name="sinopsis" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="pengarang">pengarang</label>
            <input type="text" name="pengarang" id="pengarang" />
        </div>
        <div class="form-group">
            <label for="penerbit">penerbit</label>
            <input type="text" name="penerbit" id="penerbit" />
        </div>
        <div class="form-group">
            <label for="tahun_terbit">Tahun terbit</label>
            <input type="text" name="tahun_terbit" id="tahun_terbit" />
        </div>
        <div class="form-group">
            <label for="jumlah_halaman">Jumlah halaman</label>
            <input type="text" name="jumlah_halaman" id="jumlah_halaman" />
        </div>
        <input class="btn btn-green" type="submit" value="Tambah Buku" />
        <a href="<?= base_url('buku') ?>" class="btn btn-red">Gak Jadi</a>
    </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        //find a href with id="anggota" in li then add class active in li
        $('li a#buku').parent().addClass('active');
        document.title = "Buku"

        //ketika form tambah anggota di submit
        $('#form-tambah-buku').submit(function(e) {
            e.preventDefault();
            //ambil url dari form action
            let url = "<?= base_url('buku/tambah') ?>";
            //ambil data dari form
            let data = $(this).serialize();
            //kirim data ke url dengan method post
            $.post(url, data, function(data) {
                //jika data yang dikirim dari url sukses maka tampilkan pesan sukses
                if (data.success) {
                    $('#form-tambah-buku').trigger("reset");
                    Swal.fire(
                        'Good job!',
                        data?.message,
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "<?= base_url('buku') ?>";
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