<?php 
include_once('config.php');
session_start();

if(isset($_GET['kode'])){
    $edit = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '".$_GET['kode']."' ");
    $dataEdit = mysqli_fetch_array($edit);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style-pesan.css?<?php echo time()?>">
    <title>Penjualan</title>
</head>
<body>
<div class="nav">
        <div class="logo">
                <a href="">
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

    <div class="wrapper">
        <div class="left">
            <div class="header">
                <h1>Selamat Memesan</h1>
            </div>

            <div class="content-header">
                <p>Kalo Tertarik Dengan Produk Kami, Beli Yang Banyak YAA!!</p>
                <br>
            </div>
        </div>

    <div class="right">
    
        <form action="" method="post">
            
            <div>
                <label for="kode">Kode</label>
                <input type="text" name="id_produk" id="kode" value="<?Php echo $dataEdit['id_produk'] ?>" readonly>
            
                <label for="nama">Nama Produk</label>
                <input type="text" name="nm_produk" id="nama" value="<?Php echo $dataEdit['nm_produk'] ?>" readonly>
            
                <label for="satuan">Satuan</label>
                <input type="text" name="satuan" id="satuan" value="<?Php echo $dataEdit['satuan'] ?>" readonly>
            
                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga" value="Rp.<?Php echo number_format($dataEdit['harga']) ?>" readonly/>
           
                <label for="stok">Stock</label>
                <input type="text" name="stock" id="stok" value="<?Php echo $dataEdit['stock'] ?>" readonly>

                <button class="simpan" name="edit">
                    <a href="beli.php?kode=<?php echo $dataEdit['id_produk'] ?>">Pesan</a>
                </button>

            </div>
        </form>
    </div>
    </div>
</body>
</html>