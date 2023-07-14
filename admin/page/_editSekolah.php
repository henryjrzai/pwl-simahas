<?php
if (isset($_POST['edit'])) {
    $sekolah = $_POST["txtnamasekolah"];
    $alamat = $_POST["txtalamat"];
    $id = $_POST['txtid'];
    $fotoLama = $_POST["gambarlama"];
    $namaFileBaru = "";

    // jika tidak melakukan update foto
    if ($_FILES['gambar']['error'] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = $_FILES["gambar"]["name"];
        $ukuranfile = $_FILES["gambar"]["size"];
        $error = $_FILES["gambar"]["error"];
        $tmpName = $_FILES["gambar"]["tmp_name"];

        // cek apakah tidak ada gambar yang diupload
        if ($error === 4) {
            echo "<script>alert('Masukkan gambar terlebih dahulu!')</script>";
            return false;
        }

        // cek apakah yang diupload adalah gambar
        $eksGambarValid = ['jpg', 'jpeg', 'png'];
        $eksGambar = explode('.', $foto);
        $eksGambar = strtolower(end($eksGambar));

        if (!in_array($eksGambar, $eksGambarValid)) {
            echo "<script>alert('Format file gambar tidak valid!')</script>";
            return false;
        }

        // generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $eksGambar;

        // upload gambar
        move_uploaded_file($tmpName, 'file/' . $namaFileBaru);
    }

    if (empty($sekolah) || empty($alamat)) {
        echo '<div class="toast-container position-fixed end-0 p-3" style="top: 70px">
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
        $sql = "UPDATE tbl_sekolah SET nama='$sekolah', alamat='$alamat'";
        if (!empty($namaFileBaru)) {
            $sql .= ", foto='$namaFileBaru'";
        }
        $sql .= " WHERE id='$id'";

        $query = mysqli_query($kws, $sql);

        if ($query) {
            echo '<div class="toast-container position-fixed end-0 p-3" style="top: 70px">
               <div class="toast align-items-center bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                  <div class="d-flex">
                    <div class="toast-body text-light fw-bolder">
                      Data sukses diedit
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
                      Data gagal diedit
                    </div>
                    <button type="button" class="btn-close me-2 m-auto text-white" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                </div>
            </div>';
        }
    }
}

$id = $_GET['id'];
$sql =mysqli_query($kws, "SELECT * FROM tbl_sekolah WHERE id = '$id'");
$result = mysqli_fetch_assoc($sql);
?>

<div class="container h-100 w-100">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-6 m-3">
            <form class="card p-4 shadow-sm" method="post" id="formMahasiswa" enctype="multipart/form-data">
                <div class="row mb-3 text-center">
                    <h3 class="fw-bolder">Data Sekolah</h3>
                </div>
                <div class="row mb-3">
                    <label for="txtid" class="col-sm-2 col-form-label">Id Sekolah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txtid" id="inputPassword3" value="<?php echo $result['id']?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="txtnamasekolah" class="col-sm-2 col-form-label">Nama Sekolah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txtnamasekolah" id="inputPassword3" value="<?php echo $result['nama']?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="txtalamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txtalamat" id="inputPassword3" value="<?php echo $result['alamat']?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="gambar" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <img class="img-thumbnail w-25" src="file/<?php echo $result['foto']?>" alt="">
                        <input type="file" class="form-control" name="gambar" id="inputPassword3">
                        <input type="hidden" name="gambarlama" id="gambarlama" value="<?php echo $result['foto']?>">
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary" name="edit" id="liveToastBtn">Simpan</button>
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
            window.location.href = "index.php?page=_tampDataSekolah"; // Pengalihan ke halaman success.php setelah 3 detik
        }, 2000); // Ubah nilai 3000 menjadi detik yang diinginkan (misalnya 5000 untuk 5 detik)
    }
</script>