<?php
session_start();

// Dapatkan variabel form
$email = $_POST['email']; // Menggunakan $_POST untuk mengambil data dari form
$kunci = $_POST['kunci'];

// Koneksi ke database
include "../config/koneksi.php";

// Menghindari serangan SQL Injection dengan mengamankan variabel $email dan $kunci
$email = mysqli_real_escape_string($kws, $email);
$kunci = mysqli_real_escape_string($kws, $kunci);

// Buat perintah SQL untuk mencari email dan password dari tbl_user
$sql = "SELECT * FROM tbl_user WHERE email='$email' and pass='$kunci'";

// Jalankan perintah SQL
$query = mysqli_query($kws, $sql);

if (mysqli_num_rows($query) > 0) // Jika data ditemukan
{
    // Ciptakan variabel session
    $_SESSION['email'] = $email;
    header('location: ../admin/index.php');
    exit();
}
else
{
    echo "<script>";
    echo "alert('Data Login Tidak Ditemukan.');";
    echo "window.location.href='../index.php#login';"; // Menggunakan "window.location.href" untuk mengarahkan ke halaman login
    echo "</script>";
}
?>
