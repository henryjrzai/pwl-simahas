<?php
include "../config/koneksi.php";
if (isset($_POST['daftar'])) {
    $nama = $_POST['txtnama'];
    $email = $_POST['txtemail'];
    $alamat = $_POST['txtalamat'];
    $pass = $_POST['txtpass'];

    //gambar
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
    $namafile = $_FILES["gambar"]["name"];
    $ukuranfile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

// cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "<script>// Menggunakan fungsi confirm untuk menampilkan pesan dan tombol OK dan Batal
                var result = confirm('Gambar hanya mendukung file jpg, jpeg, dan png. Kembali ke halaman?');
                
                // Memeriksa hasil dari confirm
                if (result === true) {
                    // Tindakan jika tombol OK ditekan
                    window.location.href = '_registrasi.php';
                } else {
                    // Tindakan jika tombol Batal ditekan atau dialog ditutup
                    alert('Anda menekan tombol Batal atau menutup dialog');
                }
            </script>";
        return false;
    }

// cek apakah yang diupload adalah gambar
    $eksGambar = pathinfo($namafile, PATHINFO_EXTENSION);
    if (!in_array($eksGambar, $ekstensi_diperbolehkan)) {
        echo "<script>// Menggunakan fungsi confirm untuk menampilkan pesan dan tombol OK dan Batal
                var result = confirm('Gambar hanya mendukung file jpg, jpeg, dan png. Kembali ke halaman?');
                
                // Memeriksa hasil dari confirm
                if (result === true) {
                    // Tindakan jika tombol OK ditekan
                    window.location.href = '_registrasi.php';
                } else {
                    // Tindakan jika tombol Batal ditekan atau dialog ditutup
                    alert('Anda menekan tombol Batal atau menutup dialog');
                }
            </script>";
        return false;
    }

    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $eksGambar;

    // upload gambar
    move_uploaded_file($tmpName, '../admin/file/' . $namaFileBaru);

    $sql = "INSERT INTO tbl_user (nama,email,alamat,pass, photo) VALUES ('$nama', '$email', '$alamat', '$pass', '$namaFileBaru')";

    $query = mysqli_query($kws, $sql);
    if (!$query){
        echo '
            <div id="liveToast" class="toast align-items-center text-bg-warning border-0 position-fixed end-0 z-1" role="alert" aria-live="assertive" aria-atomic="true" style="top: 70px">
              <div class="d-flex">
                <div class="toast-body">
                  Akun kamu gagal terdaftar !
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
            </div>';
    } else {
        echo '
            <div id="liveToast" class="toast align-items-center text-bg-success border-0 position-fixed end-0 z-1" style="top: 70px" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="d-flex">
                <div class="toast-body">
                  Selamat, akun kamu sudah terdaftar. Silahkan Login!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
            </div>';
    }
}
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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Daftar Akun Simahas</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="container d-flex justify-content-center align-items-center " style="height: 100vh; width: 100%">
        <div class="row d-flex justify-content-center m-1">
            <div class="registrasi col-lg-6 card">
                <form class="row g-3 p-4" method="post" enctype="multipart/form-data">
                    <div class="col-md-12 mb-3">
                        <h2 class="text-center display-6 fw-bolder">Daftar Akun Simahas</h2>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="txtemail">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" name="txtpass">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="inputAddress" name="txtnama">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="inputAddress2" name="txtalamat">
                    </div>
                    <div class="col-md-6">
                        <label for="formFile" class="form-label">Foto</label>
                        <input class="form-control" name="gambar" type="file" id="formFile">
                    </div>
                    <div class="col-12 d-flex justify-content-center flex-column mt-5">
                        <button type="submit" class="btn btn-secondary" id="liveToastBtn" name="daftar">Sign Up</button>
                        <p class="mt-3 text-center">Sudah punya akun? <a href="../index.php#login" class="fw-bolder text-decoration-none text-dark">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/bootstrap.bundle.js"></script>
    <script src="../assets/js/bootstrap.esm.js"></script>
    <script>
        const toastTrigger = document.getElementById('liveToastBtn')
        const toastLiveExample = document.getElementById('liveToast')
        if (toastTrigger) {
            toastTrigger.addEventListener('click', () => {
                const toast = new bootstrap.Toast(toastLiveExample)

                toast.show()
            })
        }
        $(document).ready(function() {
            $(".toast").toast("show");
        });

        var successToast = document.querySelector('.toast-container .bg-success .liveToast');
        if (successToast) {
            // Jika pesan sukses ditampilkan, kosongkan form setelah 3 detik
            setTimeout(function() {
                resetForm();
                window.location.href = "../index.php#login"; // Pengalihan ke halaman success.php setelah 3 detik
            }, 1000); // Ubah nilai 3000 menjadi detik yang diinginkan (misalnya 5000 untuk 5 detik)
        }
    </script>
</body>
</html>