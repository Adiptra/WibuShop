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
  <link rel="stylesheet" href="style/kwitansi.css?<?php echo time()?>">
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
      <h1>kwitansi Penjualan</h1>
    </div>
  
    <div class="deskripsi-pelanggan">
      <ul>
        <div>Telah Terima dari :</div>
        <div><?php echo $detail['nm_pelanggan']?></div>
      </ul>
      <ul>
        <div class="sejumlah">Uang Sejumlah :</div>
        <div></div>
      </ul>
    </div>
  
  
    <div class="total">
    <h4>Total : Rp. <?php echo number_format($detail['total_harga'])?></h4>
    </div>

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