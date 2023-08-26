<?php
session_start();
include 'config.php';

// echo "<pre>";
// print_r($_SESSION['kode']);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style-checkout.css?<?php echo time()?>">
    <title>Penjualan</title>
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
                <li class="home"><a href="home.php">Home</a></li>
                <li class="produk"><a href="produk.php">Produk</a></li>
                <li class="keranjang"><a href="keranjang.php">Keranjang</a></li>
                <li class="checkout"><a href="checkout.php">Checkout</a></li>
                <?php 
                if(isset($_SESSION['pelanggan'])){?>
                    <li class="logout"><a href="login/logout.php">Logout</a></li>
                <?php
                }else{?>
                    <li class="logout"><a href="login-user.php">Login</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
        <div class="header">
            <div class="group">
            <table border="1" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $totalBelanja = 0;
                    if(isset($_SESSION['kode'])){
                    ?>
                    
                    <?php foreach ($_SESSION['kode'] as $id_produk => $jumlah):?>
                    
                    <?php 
                    $ambil = mysqli_query($koneksi, "SELECT * FROM produk where id_produk='$id_produk'");
                    $pecah = mysqli_fetch_assoc($ambil);
                    $total = $pecah['harga']*$jumlah  ;


                    ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $pecah['nm_produk']?></td>
                        <td>Rp. <?php echo number_format($pecah['harga']) ?></td>
                        <td><?php echo $jumlah ?></td>
                        <td>Rp. <?php echo number_format($total) ?></td>
                    </tr>

                    
                    <?php $no++;?>
                    <?php 
                    $totalBelanja+=$total
                    ?>
                    <?php
                        endforeach;
                    ?>
                    
                    <?php 
                    }else{?>
                            <script>
                                alert("Keranjang Kosong Silahkan Membeli Barang")
                                location="produk.php"
                            </script>
                            <tr>
                                <td colspan="6" style="text-align: center;">Keranjang Kosong</td>
                            </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja</th>
                        <th>Rp. <?php echo number_format($totalBelanja) ?></th>
                    </tr>
                </tfoot>
            </table>
                <?php 
                if(isset($_SESSION['pelanggan'])){
                ?>
                <div class="wrap">
                    <form method="post">
                        <input type="text" value="<?php echo $_SESSION['pelanggan']['nm_pelanggan']?>" name="nm_pelanggan" placeholder="Nama Pelanggan" readonly>
                        <input name="alamat" value="<?php echo $_SESSION['pelanggan']['alamat']?>" placeholder="Alamat" readonly>
                        <input type="text" value="<?php echo $_SESSION['pelanggan']['telepon']?>" name="telepon" placeholder="Telepon" readonly>
                        <input type="submit" name="checkout" value="Checkout">
                    </form>
                </div>
                <?php }else{?>
                    <div class="wrap">
                    <form method="post">
                        <input type="text" value="Nama Pelanggan" name="nm_pelanggan" placeholder="Nama Pelanggan" required readonly>
                        <input name="alamat" value="Alamat" placeholder="Alamat" required readonly>
                        <input type="text" value="Telepon" name="telepon" placeholder="Telepon" required readonly>
                        <input type="submit" name="blm" value="Checkout">
                    </form>
                </div>
                <?php } ?>
                <?php
                if(isset($_POST['blm'])){
                    header('location:login-user.php');
                }
                if(isset($_POST['checkout'])){
                    $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
                    $nama = $_SESSION['pelanggan']['nm_pelanggan'];
                    $alamat = $_SESSION['pelanggan']['alamat'];
                    $tlp = $_SESSION['pelanggan']['telepon'];
                    $tgl = date("Y-m-d");

                    $q1 = mysqli_query($koneksi, "INSERT INTO pesan (id_pelanggan, tgl_pesan, harga, nm_pelanggan, alamat, telepon) VALUES ('$id_pelanggan', '$tgl', '$totalBelanja', '$nama', '$alamat', '$tlp')");
                    if($q1){
                        echo "<script>alert('Terima Kasih Telah Belanja di Toko Kami')</script>";
                        header('location: produk.php');
                    }else{
                        header('location: ?=gagal-checkout');
                    }
                    $id_pesan_baru = $koneksi->insert_id;

                    foreach ($_SESSION['kode'] as $id_produk => $jumlah){
                        $ambil  = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
                        $perproduk = $ambil->fetch_assoc();
                        
                        $total_harga = $totalBelanja;
                        $nm = $perproduk['nm_produk'];
                        $harga = $perproduk['harga'];
                        $subharga = $perproduk['harga']*$jumlah;
                        
                        $ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk'");
                        $s = $ambil->fetch_assoc();
                        $stok_normal = $s['stock'];
                        $stok = $stok_normal-$jumlah;
                        mysqli_query($koneksi, "UPDATE produk SET stock='$stok' WHERE id_produk = '$id_produk' " );


                        mysqli_query($koneksi, "INSERT INTO detil_pesan (id_pesan, id_produk, jumlah, harga, nm_produk, subharga, total_harga) VALUES ('$id_pesan_baru', '$id_produk', '$jumlah', '$harga', '$nm', '$subharga', '$total_harga')");
                        
                        
                    }
                    unset($_SESSION['kode']);
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>