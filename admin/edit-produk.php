<?php
include '../config.php';

if(isset($_GET['kode'])){
    $edit = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '".$_GET['kode']."' ");
    $dataEdit = mysqli_fetch_array($edit);
}

if(isset($_POST['edit'])){
$insert = mysqli_query($koneksi, "UPDATE produk SET id_produk = '".$_POST['id_produk']."', nm_produk = '".$_POST['nm_produk']."', satuan = '".$_POST['satuan']."', harga = '".$_POST['harga']."', stock = '".$_POST['stock']."' WHERE id_produk = '".$_GET['kode']."' " );

    if($insert){
        header('location: data-produk.php?=data-berhasil-diedit');
    }else{
        echo "Gagal Memasukkan Data Pelanggan";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit-produk.css?<?php echo time()?>">
    <title>Admin</title>
</head>
<body>
    <!--navbar-->
    <nav>
      <div class="logo">Wibu Shop</div>
      <ul>
        <li>
          <a href="admin.php">Dashboard</a>
        </li>
        <li>
          <a href="pemesanan.php">Pemesanan</a>
        </li>
        <li>
          <a href="data-pelanggan.php">Data Master</a>
        </li>
        <li>
          <a href="../login/logout.php">Logout</a>
        </li>
      </ul>
    </nav>
    <!--navbar-->
    <!--homepage-->
    <section class="homepage">
      <!--overlay-->
      <div class="overlay" id="myOverlay">
        <div class="wrap">
          <h2>Edit Produk</h2>
          <form method="post">
            <input type="text" class="id-p" value="<?php echo $dataEdit['id_produk']?>" name="id_produk" placeholder="Kode Produk" readonly>
            <input type="text" value="<?php echo $dataEdit['nm_produk']?>" name="nm_produk" placeholder="Nama Produk">
            <input type="text" value="<?php echo $dataEdit['satuan']?>" name="satuan" placeholder="Satuan">
            <input type="text" value="<?php echo $dataEdit['harga']?>" name="harga" placeholder="Harga">
            <input type="text" value="<?php echo $dataEdit['stock']?>" name="stock" placeholder="Sisa">
            <input type="submit" value="Upload" name="edit">
          </form>
        </div>
      </div>
</body>
</html>
