<?php
include '../config.php';

if(isset($_GET['kode'])){
  $edit = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan = '".$_GET['kode']."' ");
  $dataEdit = mysqli_fetch_array($edit);
}

if(isset($_POST['edit'])){
$insert = mysqli_query($koneksi, "UPDATE pelanggan SET id_pelanggan = '".$_POST['id_pelanggan']."', nm_pelanggan = '".$_POST['nm_pelanggan']."', alamat = '".$_POST['alamat']."', telepon = '".$_POST['telepon']."', email = '".$_POST['email']."' WHERE id_pelanggan = '".$_GET['kode']."' " );

  if($insert){
      header('location: data-pelanggan.php?=data-berhasil-diedit');
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
            <input type="text" class="id-p" value="<?php echo $dataEdit['id_pelanggan']?>" name="id_pelanggan" placeholder="Kode Pelanggan" readonly>
            <input type="text" value="<?php echo $dataEdit['nm_pelanggan']?>" name="nm_pelanggan" placeholder="Nama Pelanggan">
            <textarea name="alamat" name="alamat" placeholder="Alamat"><?php echo $dataEdit['alamat']?></textarea>
            <input type="text" value="<?php echo $dataEdit['telepon']?>" name="telepon" placeholder="Telepon">
            <input type="text" value="<?php echo $dataEdit['email']?>" name="email" placeholder="Email  ">
            <input type="submit" value="Upload" name="edit">
          </form>
        </div>
      </div>

</body>
</html>
