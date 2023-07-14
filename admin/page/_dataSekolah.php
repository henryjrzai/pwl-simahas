<?php
include "../../config/koneksi.php";

$sql = "SELECT * FROM tbl_sekolah";
$query = mysqli_query($kws, $sql);

$output = "";
$output = $output."<table id='myTable' class='table table-striped'>";
$output = $output."<thead>
                        <tr>
                            <td>ID</td>
                            <td>Nama Sekolah</td>
                            <td>Alamat</td>
                            <td class='w-25'>Foto</td>
                        </tr>
                    </thead>";
$output = $output."<tbody>";
while($hasil=mysqli_fetch_assoc($query)){
    $output = $output . "<tr>
                                <td>$hasil[id]</td>
                                <td>$hasil[nama]</td>  
                                <td>$hasil[alamat]</td>
                                <td><img src='file/$hasil[foto]' alt=''></td>
                            </tr>";
}
$output = $output . "</tbody></table>";
echo $output;