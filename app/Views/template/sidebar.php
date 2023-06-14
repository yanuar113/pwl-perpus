<div class="sidebar" id="sidebar">
    <ul>
        <li id="dashboard">
            <a href="<?= base_url('dashboard') ?>">
                <i class="material-icons">home</i>
                Dashboard
            </a>
        </li>
        <li id="admin">
            <a href="<?= base_url('admin') ?>">
                <i class="material-icons">person</i>
                Admin
            </a>
        </li>
        <li id="anggota">
            <a href="<?= base_url('anggota') ?>">
                <i class="material-icons">group</i>
                Anggota
            </a>
        </li>
        <li id="buku">
            <a href="<?= base_url('buku') ?>">
                <i class="material-icons">book</i>
                Buku
            </a>
        </li>
        <li id="kategori">
            <a href="<?= base_url('kategori') ?>">
                <i class="material-icons">category</i>
                Kategori
            </a>
        </li>
        <li id="peminjaman">
            <a href="<?= base_url('peminjaman') ?>">
                <i class="material-icons">list</i>
                Peminjaman
            </a>
        </li>
        <li id="pengembalian">
            <a href="<?= base_url('pengembalian') ?>">
                <i class="material-icons">autorenew</i>
                Pengembalian
            </a>
        </li>
    </ul>
</div>

<style>
    .sidebar {
        width: 20%;
        background-color: #fff;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 5%;
    }

    .sidebar li {
        margin-bottom: 4%;
        background-color: lightgray;
        padding: 5% 15%;
        border-radius: 8px;
    }

    .sidebar li:hover {
        background-color: #674a40;
        color: #fff;
    }

    .sidebar li a:hover {
        color: #fff;
    }

    .sidebar li.active a{
        color: #fff;
    }

    .sidebar li.active {
        margin-bottom: 4%;
        background-color: #674a40;
        color: #fff;
        padding: 5% 15%;
        border-radius: 8px;
    }

    .sidebar a {
        display: flex;
        text-decoration: none;
        /* color: #fff; */
        font-size: 1.5vw;
        white-space: nowrap;
        text-align: center;
        align-items: center;
        justify-content: center;
    }

    .sidebar .material-icons {
        font-size: 1.8vw;
        margin-right: 3%;
    }

    @media(max-width: 768px) {
        .sidebar {
            width: 100%;
        }

        .sidebar ul {
            padding: 2%;
        }

        .sidebar li {
            margin-bottom: 2%;
        }
    }
</style>