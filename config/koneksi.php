<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_mahasiswa";

//1.koneksi ke database server (mysql)
$kws = mysqli_connect($host, $user, $pass, $db);
if (!$kws)
  die("Koneksi ke mysql error. . .");
