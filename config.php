<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'penjualan');

// Check connection
if($koneksi == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>