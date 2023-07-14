<?php
session_start();
if (!$_SESSION['email'])
{
    header("location:../index.php#login");
    exit();
}
include "../config/koneksi.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="../assets/img/favicon-96x96.png" type="image/x-icon">
    <link rel="icon" href="../assets/img/favicon-96x96.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!--data tables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />

    <!--Ajax-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Admin - SIMAHAS</title>
</head>
<body>
<!--Navigasi-->
<nav class="navbar navbar-expand-lg text-light">
    <div class="container">
        <a class="navbar-brand" href="#">ADMIN SIMAHAS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto d-flex gap-lg-5">
                <li class="nav-item">
                    <a class="nav-link btn" href="index.php?page=_beranda">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn" href="#data" role="button" data-bs-toggle="dropdown" aria-expanded="false">Data </a>
                    <ul class="dropdown-menu list-menu">
                        <li><a class="dropdown-item text-center" id="tmpMhs" href="index.php?page=_tampDataMahasiswa">Mahasiswa</a></li>
                        <li><a class="dropdown-item text-center" href="index.php?page=_tampDataOrangTua">Orang Tua</a></li>
                        <li><a class="dropdown-item text-center" href="index.php?page=_tampDataSekolah">Sekolah</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn" href="#profil">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-danger" href="index.php?page=logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--Akhir Navigasi-->

<!--Menu Tampil Data-->
    <div class="container data mt-3">
        <?php
        if(isset($_GET['page'])) {
            $halaman = $_GET['page'];
        } else {
            $halaman = "";
        }

        if($halaman == ""){
            include "page/_beranda.php";
        } else if (!file_exists("page/$halaman.php")){
            include "page/404.php";
        } else {
            include "page/$halaman.php";
        }
        ?>
    </div>
<!--Menu Akhir Tampil Data-->

<!--Tampil Data-->
    <div class="container hasil mt-4">

    </div>
<!--Akhir Tampil Data-->


<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
<script src="../assets/js/bootstrap.bundle.js"></script>
<script src="../assets/js/script.js"></script>

</body>
</html>