<?php 
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link href="admin/assets/css/bootstrap.css" rel="stylesheet" /> -->
  <link rel="stylesheet" href="style/faktur.css?<?php echo time()?>">
  <title>Faktur</title>
</head>
<body>
  <script>
    window.print();
  </script>
  <div class="container">
    <header>
      <h1 class="nama-toko">Wibu'Shop</h1>
      <h3 class="keterangan">Toko Komputer Wibu</h3>
    </header>
    <?php 
      $ambil = mysqli_query($koneksi, "SELECT * FROM pesan JOIN detil_pesan ON pesan.id_pesan=detil_pesan.id_pesan WHERE pesan.id_pesan='$_GET[kode]' ");
      $detail = $ambil->fetch_assoc();
    ?>
    <div class="deskripsi">
      <div class="alamat">Alamat : Jl. Bekasi Timur IV</div>
      <div class="phone">Phone : 085718467572</div>
      <div class="date">Date : <?php echo $detail['tgl_pesan']?></div>
    </div>
  
    <div class="logo-faktur">
      <h1>Faktur Penjualan</h1>
    </div>
  
    <div class="deskripsi-pelanggan">
      <ul>
        <div>Kode Pesanan : <?php echo $detail['id_pesan']?></div>
        <div>Tanggal Pesanan : <?php echo $detail['tgl_pesan']?></div>
      </ul>
      <ul>
        <div>Pelanggan : <?php echo $detail['nm_pelanggan']?></div>
        <div>Alamat : <?php echo $detail['alamat']?></div>
      </ul>
    </div>
  
  
    <table border="1"> 
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Qty</th>
          <th>Harga</th>
        </tr>
      </thead>
      <?php 
        $no = 1;
        $ambil1 = mysqli_query($koneksi, "SELECT * FROM detil_pesan WHERE id_pesan='$_GET[kode]'");
        while($detail1 = $ambil1->fetch_assoc()){
      ?>
      <tbody>
        <td><?php echo $no++?></td>
        <td><?php echo $detail1['id_produk']?></td>
        <td><?php echo $detail1['nm_produk']?></td>
        <td><?php echo $detail1['jumlah']?></td>
        <td>Rp. <?php echo number_format($detail1['harga'])?></td>
      </tbody>
      <?php 
        }
      ?>
    </table>
  
    <h4>Total : Rp. <?php echo number_format($detail['total_harga'])?></h4>

    <div class="ttd">
      <div class="left">
        <h4><?php echo $detail['nm_pelanggan']?></h4>
        <hr>
        <div>Wibu'Shop</div>
      </div>
      <div class="right">
        <h4>Wibu'Shop</h4>
        <hr>
        <div>Direktur : Wibu'Shop Admin</div>
      </div>
    </div>
  </div>
</body>
</html>