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
    <link rel="stylesheet" href="style/style-keranjang.css?<?php echo time()?>">
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
            <table border="1" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    if(isset($_SESSION['kode'])){
                    ?>
                    
                    <?php foreach ($_SESSION['kode'] as $id_produk => $jumlah):?>
                    
                    <?php 
                    $ambil = mysqli_query($koneksi, "SELECT * FROM produk where id_produk='$id_produk'");
                    $pecah = mysqli_fetch_assoc($ambil);
                    $total = $pecah['harga']*$jumlah;


                    ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $pecah['nm_produk']?></td>
                        <td>Rp. <?php echo number_format($pecah['harga']) ?></td>
                        <td><?php echo $jumlah ?></td>
                        <td>Rp. <?php echo number_format($total) ?></td>
                        <td>
                            <a href="hapus.php?kode=<?php echo $id_produk?>">Hapus</a>
                        </td>
                    </tr>

                    
                    <?php $no++;?>
                    <?php
                        endforeach;
                    ?>
                    <?php 
                    }else{?>
                            <tr>
                                <td colspan="6" style="text-align: center;">Keranjang Kosong</td>
                            </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <?php
                if(isset($_SESSION['pelanggan'])){
                ?>
                <tfoot>
                    <tr>
                        <th colspan="5"><h4>Checkout?</h4></th>
                        <th>
                            <a href="checkout.php">Checkout</a>
                            <a href="produk.php">Lanjutkan Belanja</a>
                        </th>
                    </tr>
                </tfoot>
                <?php
                }else{
                ?>
                <tfoot>
                    <tr>
                        <th colspan="5"><h4>Checkout?</h4></th>
                        <th>
                            <a href="login-user.php">Checkout</a>
                            <a href="produk.php">Lanjutkan Belanja</a>
                        </th>
                    </tr>
                </tfoot>
                <?php
                }
                ?>
            </table>
        </div>
        
    </div>
</body>
</html>