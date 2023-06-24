<div class="sidebar" id="sidebar">
    <ul>
        <li>
            <a id="dashboard">
                <i class="material-icons">home</i>
                Dashboard
            </a>
        </li>
        <li>
            <a id="admin">
                <i class="material-icons">person</i>
                Admin
            </a>
        </li>
        <li>
            <a id="anggota">
                <i class="material-icons">group</i>
                Anggota
            </a>
        </li>
        <li>
            <a id="buku">
                <i class="material-icons">book</i>
                Buku
            </a>
        </li>
        <li>
            <a id="kategori">
                <i class="material-icons">category</i>
                Kategori
            </a>
        </li>
        <li>
            <a id="peminjaman">
                <i class="material-icons">list</i>
                Peminjaman
            </a>
        </li>
        <li>
            <a id="pengembalian">
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
        background-color: purple;
        border-radius: 8px;
    }

    .sidebar li:hover {
        background-color: lightpink;
        color: #fff;
    }

    .sidebar li:hover a, .sidebar li a:hover, .sidebar li.active a {
        color: #fff;
        font-weight:bold;
        border-radius:8px;
        cursor: pointer;
    }

    .sidebar li.active {
        margin-bottom: 4%;
        background-color: #333;
        color: #fff;
    }

    .sidebar a {
        display: flex;
        text-decoration: none;
        font-size: 1.5vw;
        white-space: nowrap;
        text-align: center;
        align-items: center;
        justify-content: center;
        padding: 5% 15%;
        border-radius: 8px;
        color: white;
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