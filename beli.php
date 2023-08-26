<?php
include_once 'config.php';

session_start();

$id_produk = $_GET['kode'];

if(isset($_SESSION['kode'][$id_produk])){
    $_SESSION['kode'][$id_produk]+=1 ;
}else{
    $_SESSION['kode'][$id_produk] = 1;
}
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

?>
<script>
    alert("Masukkan Ke Keranjang?");
    location='keranjang.php';
</script>
