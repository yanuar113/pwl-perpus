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
    <p>Ini adalah halaman tambah anggota perpustakaan.</p>
    <form method="post" id="form-tambah-anggota">
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="nama" id="nama" />
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" />
        </div>
        <div class="form-group">
            <label for="telepon">No Telepon</label>
            <input type="text" name="telepon" id="telepon" />
        </div>
        <input class="btn btn-green" type="submit" value="Tambah Anggota" />
        <a href="<?= base_url('anggota') ?>" class="btn btn-red">Gak Jadi</a>
    </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        //find a href with id="anggota" in li then add class active in li
        $('li a#anggota').parent().addClass('active');

        $('#form-tambah-anggota').submit(function(e) {
            e.preventDefault();

            let url = "<?= base_url('anggota/tambah') ?>";
            let data = $(this).serialize();
            $.post(url, data, function(data) {
                console.log(data)
                if (data.success) {
                    $('#form-tambah-anggota').trigger("reset");
                    Swal.fire(
                        'Good job!',
                        data?.message,
                        'success'
                    )
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