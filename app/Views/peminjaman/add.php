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
    <p>Ini adalah halaman tambah peminjaman perpustakaan.</p>
    <form method="post" id="form-tambah-peminjaman">
        <div class="form-group">
            <label for="buku">Anggota</label>
            <select name="id_anggota" id="id_anggota">
                <?php
                //foreach $anggotas
                foreach ($anggotas as $anggota) { ?>
                    <option value="<?= $anggota['id'] ?>"><?= $anggota['nama'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="buku">Buku</label>
            <select name="id_buku" id="id_buku">
                <?php
                //foreach $bukus
                foreach ($bukus as $buku) { ?>
                    <option value="<?= $buku['id'] ?>"><?= $buku['judul'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
            <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman" />
        </div>
        <div class="form-group">
            <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
            <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" />
        </div>
        <input class="btn btn-green" type="submit" value="Tambah Peminjaman" />
        <a href="<?= base_url('peminjaman') ?>" class="btn btn-red">Gak Jadi</a>
    </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        //find a href with id="anggota" in li then add class active in li
        $('li a#peminjaman').parent().addClass('active');
        document.title = "Buku"

        //ketika form tambah anggota di submit
        $('#form-tambah-peminjaman').submit(function(e) {
            e.preventDefault();
            //ambil url dari form action
            let url = "<?= base_url('peminjaman/tambah') ?>";
            //ambil data dari form
            let data = $(this).serialize();
            //kirim data ke url dengan method post
            $.post(url, data, function(data) {
                //jika data yang dikirim dari url sukses maka tampilkan pesan sukses
                if (data.success) {
                    $('#form-tambah-peminjaman').trigger("reset");
                    Swal.fire(
                        'Good job!',
                        data?.message,
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "<?= base_url('peminjaman') ?>";
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