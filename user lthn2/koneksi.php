<?php
$conn = mysqli_connect("localhost", "root", "", "rekap_santrii");
 
if(!$conn) {
    die("koneksi gagal:" . mysqli_connect_error());
}
?>