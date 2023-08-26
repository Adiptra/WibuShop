<?php
include 'config.php';
session_start();
$urut = 1;?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/detil_pesan.css?<?php echo time()?>">
    <title>Detil Pesan</title>
</head>
<body>
<div class="wrapper">
        <div class="nav">
            <div class="logo">
                <a href="#">
                    <p>Wibu'Shop</p>
                </a>
            </div>
            <ul>
                <li class="home"><a href="admin/admin.php">Dashboard</a></li>
                <li class="produk"><a href="admin/pemesanan.php">Pemesanan</a></li>
                <li class="keranjang"><a href="admin/data-master.php">Data-Master</a></li>
                <li class="logout"><a href="login/logout.php">Logout</a></li>
        </div>
    <div class="header">
        <div class="container">
            <div class="title">Detail Pesan</div>
            <div class="data">
                <?php 
                $ambil = mysqli_query($koneksi, "SELECT * FROM pesan JOIN detil_pesan ON pesan.id_pesan=detil_pesan.id_pesan WHERE pesan.id_pesan='$_GET[kode]' ");
                $detail = $ambil->fetch_assoc();
                ?>
                <div class="data-left">
                    <ul>
                        <li>Kode Pesanan : <?php echo $detail['id_pesan']?></li>
                        <li>Tanggal : <?php echo $detail['tgl_pesan']?></li>

                    </ul>
                </div>
                <div class="data-right">
                    <ul>
                        <li>Pelanggan : <?php echo $detail['nm_pelanggan']?></li>
                        <li>Alamat : <?php echo $detail['alamat']?></li>
                        <li>Telepon : <?php echo $detail['telepon']?></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            
            <div class="title">Detail Produk Pesanan</div>
            <table border="1" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <?php 
                $ambil1 = mysqli_query($koneksi, "SELECT * FROM detil_pesan WHERE id_pesan='$_GET[kode]'");
                while($detail1 = $ambil1->fetch_assoc()){
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $urut++ ?></td>
                        <td><?php echo $detail1['id_produk']?></td>
                        <td><?php echo $detail1['jumlah']?></td>
                        <td>Rp. <?php echo number_format($detail1['subharga'])?></td>
                    </tr>
                </tbody>
                
                <?php
                }
                ?>
                <tfoot>
                    <tr>
                        <td colspan="3">Jumlah</td>
                        <td >Rp. <?php echo number_format($detail['total_harga']);?></td>
                    </tr>
                </tfoot>
            </table>
            
        </div>
        
    </div>
</div>
</body>
</html>