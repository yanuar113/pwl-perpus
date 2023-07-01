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
    <p>Ini adalah halaman tambah pengembalian perpustakaan.</p>
    <form method="post" id="form-tambah-pengembalian">
        <div class="form-group">
            <label for="buku">Peminjaman</label>
            <select name="id_peminjaman" id="id_peminjaman">
                <option value="">-- Pilih Peminjaman --</option>
                <?php
                //foreach $anggotas
                foreach ($peminjamans as $peminjaman) { ?>
                    <option value="<?= $peminjaman['id'] ?>" data-datekembali="<?= $peminjaman['tanggal_pengembalian'] ?>"><?= $peminjaman['nama'] ?> | <?= $peminjaman['judul'] ?> </option>
                <?php
                }
                ?>
            </select>
            <input type="hidden" name="tanggal_harus_kembali" id="tanggal_harus_kembali">
        </div>
        <div class="form-group">
            <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
            <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" />
        </div>
        <div class="form-group">
            <label for="denda">Denda</label>
            <input type="text" name="denda" id="denda" />
        </div>
        <input class="btn btn-green" type="submit" value="Tambah Pengembalian" />
        <a href="<?= base_url('pengembalian') ?>" class="btn btn-red">Gak Jadi</a>
    </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        //find a href with id="anggota" in li then add class active in li
        $('li a#pengembalian').parent().addClass('active');
        document.title = "Buku"

        //ketika form tambah anggota di submit
        $('#form-tambah-pengembalian').submit(function(e) {
            e.preventDefault();
            //ambil url dari form action
            let url = "<?= base_url('pengembalian/tambah') ?>";
            //ambil data dari form
            let data = $(this).serialize();
            //kirim data ke url dengan method post
            $.post(url, data, function(data) {
                //jika data yang dikirim dari url sukses maka tampilkan pesan sukses
                if (data.success) {
                    $('#form-tambah-pengembalian').trigger("reset");
                    Swal.fire(
                        'Good job!',
                        data.message,
                        'success'
                    ).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "<?= base_url('pengembalian') ?>";
                        }
                    })
                } else {
                    Swal.fire(
                        'Oops!',
                        data.message,
                        'error'
                    )
                }
            })
        })

        $('#id_peminjaman, #tanggal_pengembalian').on('change', function() {
            var dateKembali = $('#id_peminjaman option:selected').data('datekembali');
            $('#tanggal_harus_kembali').val(dateKembali);
            var tanggalPengembalian = $('#tanggal_pengembalian').val();

            // Calculate the penalty
            var dateKembaliObj = new Date(dateKembali);
            var tanggalPengembalianObj = new Date(tanggalPengembalian);
            var differenceInTime = tanggalPengembalianObj.getTime() - dateKembaliObj.getTime();
            var differenceInDays = differenceInTime / (1000 * 3600 * 24);
            var penalty = differenceInDays * 2000;

            penalty = Math.max(0, penalty);

            // Set the penalty value
            $('#denda').val(penalty);
        })

    })
</script>
<?= $this->endSection() ?>