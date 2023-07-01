<?php $session = \Config\Services::session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="<?= base_url('css/sweetalert.min.css') ?>">
    <script src="<?= base_url('js/sweetalert.min.js') ?>"></script>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif
        }

        .container {
            display: flex;
        }

        .sidebar {
            width: 20%;
            background-color: #f1f1f1;
        }

        .content {
            flex-grow: 1;
            padding: 2%;
        }

        header {
            background-color: purple;
            color: #fff;
            padding: 1%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        header h1 {
            margin: 0;
            padding: 0;
            text-align: center;
            flex-grow: 1;
            font-size: 4vw;
        }

        header .material-icons {
            font-size: 3vw;
            margin-right: 2%;
        }

        @media(max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .content {
                margin-top: 2%;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            header .material-icons {
                margin-right: 0;
                margin-bottom: 2%;
            }
        }

        .form-group {
            margin: 1% 0;
            display: flex;
            flex-direction: column;

        }

        .form-group label {
            margin-bottom: .5%;
        }

        .form-group input,
        .form-group textarea {
            padding: 1%;
            border: 1px solid #333;
            border-radius: 5px;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border: 1px solid #333;
            box-shadow: 0 0 5px #333;
        }

        /* style for select option */
        .form-group select {
            padding: 1%;
            border: 1px solid #333;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn {
            padding: 1%;
            border: 1px solid #333;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
            margin-right: 1%;
            cursor: pointer;
            background-color: #fff;
            font-size: 1vw;
        }

        .btn:hover {
            background-color: purple;
            color: #fff;
        }

        .btn:focus {
            outline: none;
            border: 1px solid #333;
            box-shadow: 0 0 5px #333;
        }

        .btn-red {
            background-color: red;
            color: #fff;
        }

        .btn-red:hover {
            background-color: #fff;
            color: #333;
        }

        .btn-yellow {
            background-color: yellow;
            color: #333;
        }

        .btn-yellow:hover {
            background-color: #fff;
            color: #333;
        }

        .btn-green {
            background-color: green;
            color: #fff;
        }

        .btn-green:hover {
            background-color: #fff;
            color: #333;
        }

        .btn-black {
            background-color: #333;
            color: #fff;
        }

        .btn-black:hover {
            background-color: #fff;
            color: #333;
        }

        /* create table style */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 3%;
        }

        table th {
            background-color: #333;
            color: #fff;
        }

        table td,
        table th {
            border: 1px solid #333;
            padding: 1%;
        }
    </style>
</head>

<body>
    <header>
        <i class="material-icons">dashboard</i>
        <h1>Header </h1>
    </header>

    <script>
        let sidebar = document.getElementById('sidebar')
        let content = document.getElementById('content')

        sidebar.style.float = 'left'
        content.style.marginLeft = '20%'
    </script>