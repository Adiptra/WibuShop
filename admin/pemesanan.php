<?php
include '../config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>
    <link rel="stylesheet" href="css/pemesanan.css?<?php echo time()?>" />
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
          <a href="data-produk.php">Data Master</a>
        </li>
        <li>
          <a href="../login/logout.php">Logout</a>
        </li>
      </ul>
    </nav>
    <!--navbar-->
    <!--Content-->
    <section class="homepage">
      <table>
        <tr>
          <th>No</th>
          <th>Kode Pesanan</th>
          <th>Nama Pelanggan</th>
          <th>Kode Pelanggan</th>
          <th>Tanggal Pesanan</th>
          <th>Action</th>
        </tr>
        <?php
          $nomor = 1;
          $q1 = mysqli_query($koneksi, "SELECT * FROM pesan");
          while($hasil = mysqli_fetch_array($q1)){
        ?>
        <tr>
          <td><?php echo $nomor++ ?></td>
          <td><?php echo $hasil['id_pesan']?></td>
          <td><?php echo $hasil['nm_pelanggan']?></td>
          <td><?php echo $hasil['id_pelanggan']?></td>
          <td><?php echo $hasil['tgl_pesan']?></td>
          <td>
            <a href="../detil_pesan.php?kode=<?php echo $hasil['id_pesan']?>">Detail Pesan</a>
            <a href="../faktur.php?kode=<?php echo $hasil['id_pesan']?>">Faktur</a>
            <a href="../kwitansi.php?kode=<?php echo $hasil['id_pesan']?>">Kuitansi</a>
            <a href="?kode=<?php echo $hasil['id_pesan']?>">Hapus</a>
          </td>
        </tr>
        <?php
          }
        ?>
        <?php 
        if(isset($_GET['kode'])){
            $hapus = mysqli_query($koneksi, "DELETE FROM pesan WHERE id_pesan = '".$_GET['kode']."' ");

            if($hapus){
                echo "<meta http-equiv=refresh content=2;URL='pemesanan.php'>'";
            }else{
                echo "Data Gagal Terhapus";
            }
        }
        ?>
      </table>
    </section>
    <!--content-->
  </body>
</html>
