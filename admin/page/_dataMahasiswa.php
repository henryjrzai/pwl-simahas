<?php
include "../../config/koneksi.php";

$sql = "SELECT * FROM tbl_mahasiswa";
$query = mysqli_query($kws, $sql);

$output = "";
$output = $output."<table id='myTable' class='table table-striped'>";
$output = $output."<thead>
                        <tr>
                            <td>NPM</td>
                            <td>Nama</td>
                            <td>Jenkel</td>
                            <td>Alamat</td>
                            <td>Tanggal Lahir</td>
                        </tr>
                    </thead>";
$output = $output."<tbody>";
while($hasil=mysqli_fetch_assoc($query)){
    $output = $output . "<tr>
                                <td>$hasil[npm]</td>
                                <td>$hasil[nama]</td>  
                                <td>$hasil[jenkel]</td>
                                <td>$hasil[alamat]</td>
                                <td>$hasil[tanggallahir]</td>
                            </tr>";
}
$output = $output . "</tbody></table>";
echo $output;