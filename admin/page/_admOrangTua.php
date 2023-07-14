<?php
if (isset($_POST['simpan'])) {
    $ayah = $_POST["txtnamaayah"];
    $ibu = $_POST["txtnamaibu"];
    $alamat = $_POST["txtalamat"];

    //gambar
    $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
    $namafile = $_FILES["gambar"]["name"];
    $ukuranfile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "<script>alert('Masukkan gambar terlebih dahulu!')</script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $eksGambar = pathinfo($namafile, PATHINFO_EXTENSION);
    if (!in_array($eksGambar, $ekstensi_diperbolehkan)) {
        echo "<script>alert('Gambar hanya mendukung file jpg, jpeg, dan png')</script>";
        return false;
    }

    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $eksGambar;

    if (empty($ayah) || empty($ibu) || empty($alamat)) {
        echo '<div class="toast-container position-fixed top-50 end-0 p-3">
               <div class="toast align-items-center bg-warning" role="alert" aria-live="assertive" aria-atomic="true">
                  <div class="d-flex">
                    <div class="toast-body text-light fw-bolder">
                      Masukan data dengan lengkap !
                    </div>
                    <button type="button" class="btn-close me-2 m-auto text-white" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                </div>
            </div>';
    } else {
        // upload gambar
        move_uploaded_file($tmpName, 'file/' . $namaFileBaru);

        $sql = "INSERT INTO tbl_ortu (ayah, ibu, alamat, foto) VALUES ('$ayah', '$ibu', '$alamat', '$namaFileBaru')";
        $query = mysqli_query($kws, $sql);

        if ($query) {
            echo '<div class="toast-container position-fixed end-0 p-3" style="top: 70px">
               <div class="toast align-items-center bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                  <div class="d-flex">
                    <div class="toast-body text-light fw-bolder">
                      Data sukses tersimpan
                    </div>
                    <button type="button" class="btn-close me-2 m-auto text-white" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                </div>  
            </div>';
        } else {
            echo '<div class="toast-container position-fixed end-0 p-3" style="top: 70px">
               <div class="toast align-items-center bg-warning" role="alert" aria-live="assertive" aria-atomic="true">
                  <div class="d-flex">
                    <div class="toast-body text-light fw-bolder">
                      Data gagal disimpan
                    </div>
                    <button type="button" class="btn-close me-2 m-auto text-white" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                </div>
            </div>';
        }

        // Tutup koneksi database
        mysqli_close($kws);
    }
}
?>

<div class="container h-100 w-100">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-6 m-3">
            <form class="card p-4 shadow-sm" method="post" id="formMahasiswa" enctype="multipart/form-data">
                <div class="row mb-3 text-center">
                    <h3 class="fw-bolder">Data Orang Tua</h3>
                </div>
                <div class="row mb-3">
                    <label for="txtnamaayah" class="col-sm-2 col-form-label">Nama Ayah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txtnamaayah" id="inputPassword3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="txtnamaibu" class="col-sm-2 col-form-label">Nama Ibu</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txtnamaibu" id="inputPassword3">
                    </div>
                </div><div class="row mb-3">
                    <label for="txtalamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txtalamat" id="inputPassword3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gambar" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="gambar" id="inputPassword3">
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary" name="simpan" id="liveToastBtn">Simpan</button>
                    <button type="reset" class="btn btn-danger">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // Fungsi untuk mengosongkan form
    function resetForm() {
        document.getElementById("formMahasiswa").reset();
    }

    // Cek apakah pesan sukses ditampilkan
    var successToast = document.querySelector('.toast-container .bg-success');
    if (successToast) {
        // Jika pesan sukses ditampilkan, kosongkan form setelah 3 detik
        setTimeout(function() {
            resetForm();
            window.location.href = "index.php?page=_tampDataOrangTua"; // Pengalihan ke halaman success.php setelah 3 detik
        }, 2000); // Ubah nilai 3000 menjadi detik yang diinginkan (misalnya 5000 untuk 5 detik)
    }
</script>