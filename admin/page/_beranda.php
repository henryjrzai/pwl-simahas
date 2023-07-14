<div class="umum">
    <div class="info rounded-4" id="idmhs">
        <?php
        //perintah sql untuk mencari banyak jumlah reord dari tabel mahasiswa
        $sql = "SELECT COUNT(*) as banyak from tbl_mahasiswa";
        $query = mysqli_query($kws, $sql);
        $hasil = mysqli_fetch_assoc($query);
        echo "<div class='keterangan'><a><h4 class='fs-3'>$hasil[banyak]</h4><h4 class='fs-6'> Mahasiswa</h4></a></div>
                            <div class='gambar'><img src='../assets/img/mahasiswa.png' alt=''></div>";
        ?>
    </div>
    <div class="info rounded-4" id="iduser">
        <?php
        //buat perintah sql untuk mencari banyak jumlah reord dari tabel mahasiswa
        $sql = "SELECT COUNT(*) as banyak from tbl_user";
        $query = mysqli_query($kws, $sql);
        $hasil = mysqli_fetch_assoc($query);
        echo "<div class='keterangan'><a><h4 class='fs-3'>$hasil[banyak]</h4><h4 class='fs-6'>User</h4></a></div>
                          <div class='gambar'><img src='../assets/img/user.png' alt=''></div>";
        ?>
    </div>
    <div class="info rounded-4" id="idortu">
        <?php
        //buat perintah sql untuk mencari banyak jumlah reord dari tabel mahasiswa
        $sql = "SELECT COUNT(*) as banyak from tbl_ortu";
        $query = mysqli_query($kws, $sql);
        $hasil = mysqli_fetch_assoc($query);
        echo "<div class='keterangan'><a><h4 class='fs-3'>$hasil[banyak]</h4><h4 class='fs-6'>Orang Tua</h4></a></div>
                              <div class='gambar'><img src='../assets/img/orangtua.png' alt=''></div>";
        ?>
    </div>
    <div class="info rounded-4" id="idskl">
        <?php
        //buat perintah sql untuk mencari banyak jumlah reord dari tabel mahasiswa
        $sql = "SELECT COUNT(*) as banyak from tbl_sekolah";
        $query = mysqli_query($kws, $sql);
        $hasil = mysqli_fetch_assoc($query);
        echo "<div class='keterangan'><a><h4 class='fs-3'>$hasil[banyak]</h4><h4 class='fs-6'>Sekolah</h4></a></div>
                              <div class='gambar'><img src='../assets/img/sekolah.png' alt=''></div>";
        ?>
    </div>
</div>