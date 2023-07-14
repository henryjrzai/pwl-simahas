<?php
include "../config/konesi.php";

if (isset($_POST['simpan'])) {
    $npm = $_POST["txtnpm"];
    $nama = $_POST["txtnama"];
    $jenkel = $_POST["rdojenkel"];
    $agama = $_POST["sltagama"];
    $alamat = $_POST["txtalamat"];
    $tanggallahir = $_POST["dttgllahir"];

    if (empty($npm) || empty($nama) || empty($jenkel) || empty($alamat) || empty($agama) || empty($tanggallahir)) {
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
        $sql = "INSERT INTO tbl_mahasiswa (npm, nama, jenkel, agama, alamat, tanggallahir) " .
            "VALUES ('$npm', '$nama', '$jenkel', '$agama', '$alamat', '$tanggallahir')";
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
            echo '<div class="toast-container position-fixed end-0 p-3" style="top: 150px">
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
    }
}
?>

<div class="container h-100 w-100">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-6 m-3">
            <form class="card p-4 shadow-sm" method="post" id="formMahasiswa">
                <div class="row mb-3 text-center">
                    <h3 class="fw-bolder">Data Mahasiswa</h3>
                </div>
                <div class="row mb-3">
                    <label for="txtnpm" class="col-sm-2 col-form-label">NPM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txtnpm" id="inputEmail3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="txtnama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txtnama" id="inputPassword3">
                    </div>
                </div>
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                    <div class="col-sm-10">
                        <div class="form-check d-flex gap-5">
                            <div>
                                <input class="form-check-input" type="radio" name="rdojenkel" id="gridRadios1" value="Laki-Laki">
                                <label class="form-check-label" for="gridRadios1">Laki - Laki</label>
                            </div>
                            <div>
                                <input class="form-check-input" type="radio" name="rdojenkel" id="gridRadios2" value="Perempuan">
                                <label class="form-check-label" for="gridRadios2">Perempuan</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="row mb-3">
                    <label for="sltagama" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                        <select name="sltagama" class="form-select" aria-label="Default select example">
                            <option>-- Pilih agama --</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Islam">Islam</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                            <option value="AK">Aliran Kepercayaan</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="txtalamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txtalamat" id="inputPassword3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="dttgllahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="dttgllahir" id="inputPassword3">
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
            window.location.href = "index.php?page=_tampDataMahasiswa"; // Pengalihan ke halaman success.php setelah 3 detik
        }, 2000); // Ubah nilai 3000 menjadi detik yang diinginkan (misalnya 5000 untuk 5 detik)
    }
</script>