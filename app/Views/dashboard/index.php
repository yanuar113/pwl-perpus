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

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 40%;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .container {
        display: flex;
        flex-direction: row;
        padding: 2px 16px;
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
    <h2>BODY</h2>
    <p>Ini adalah halaman dashboard perpustakaan.</p>
    <section class="section">
        <div class="card">
            <div class="container">
                <h4><b>Jumlah Anggota</b></h4>
                <p><?= $jumlah_anggota?></p>
            </div>
        </div>
        <div class="card">
            <div class="container">
                <h4><b>Jumlah Buku</b></h4>
                <p><?= $jumlah_buku?></p>
            </div>
        </div>
        <div class="card">
            <div class="container">
                <h4><b>Jumlah Peminjaman</b></h4>
                <p><?= $jumlah_peminjaman?></p>
            </div>
        </div>
        
    </section>
</div>
<?= $this->endSection() ?>