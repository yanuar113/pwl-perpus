<div class="sidebar" id="sidebar">
    <ul>
        <li>
            <a href="#">
                <i class="material-icons">home</i>
                Menu 1
            </a>
        </li>
        <li>
            <a href="#">
                <i class="material-icons">person</i>
                Menu 2
            </a>
        </li>
        <li>
            <a href="#">
                <i class="material-icons">menu</i>
                Menu 3
            </a>
        </li>
        <li>
            <a href="#">
                <i class="material-icons">book</i>
                Menu 4
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
        background-color: #674a40;
        padding: 5% 15%;
        border-radius: 8px;
    }

    .sidebar a {
        display: flex;
        text-decoration: none;
        color: #fff;
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