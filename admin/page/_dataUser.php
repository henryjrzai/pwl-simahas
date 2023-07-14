<?php
include "../../config/koneksi.php";

$sql = "SELECT * FROM tbl_user";
$query = mysqli_query($kws, $sql);

$output = "";
$output = $output."<table id='myTable' class='table table-striped'>";
$output = $output."<thead>
                        <tr>
                            <td>ID</td>
                            <td>Nama</td>
                            <td>Email</td>
                            <td>Alamat</td>
                            <td>Foto</td>
                        </tr>
                    </thead>";
$output = $output."<tbody>";
while($hasil=mysqli_fetch_assoc($query)){
    $output = $output . "<tr>
                                <td>$hasil[id]</td>
                                <td>$hasil[nama]</td>  
                                <td>$hasil[email]</td>
                                <td>$hasil[alamat]</td>
                                <td><img src='file/$hasil[photo]' alt=''></td>
                            </tr>";
}
$output = $output . "</tbody></table>";
echo $output;