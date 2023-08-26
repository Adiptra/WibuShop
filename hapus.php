<?php

session_start();

$id_produk = $_GET['kode'];
unset($_SESSION['kode'][$id_produk]);

echo "<script>alert(Produk Dihapus)</script>";
echo "<script>location='keranjang.php'</script>"
?>