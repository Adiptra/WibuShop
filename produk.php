<?php 
include_once('config.php');


session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan</title>
    <link rel="stylesheet" href="style/style-produk.css?<?php echo time()?>" >
</head>
<body>
<div class="wrapper">
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
        <div class="header">
            <h1>Mau Beli Apa Hari Ini?</h1>
        </div>

        <div class="content-header">
            <p>Disini Kami Menyediakan Komputer Bagi Para Wibu Loh!!</p>
            <br>
            <div class="btn">
                <tr>
                    <td>
                        <select name="nm_produk" class="select" value="Pilih Produk" onchange="location = this.value">
                            <option value="produk.php">Produk</option>
                        <?php
                            $sql = mysqli_query($koneksi, "SELECT * FROM produk");
                            $no = 1;
                            while($r2 = mysqli_fetch_array($sql)){
                        ?>
                            <option value="produk.php?kode=<?php echo $r2['id_produk']?>" ><?php echo $r2['nm_produk']?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </td>
                </tr>
            </div>
        </div>
    </div>
    <div class="">
    <form action="" method="get">
            <?php 
                    if(isset($_GET['kode'])){
                        $id = $_GET['kode'];
                        $data = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk like '%".$id."%'");				
                    }else{
                        $data = mysqli_query($koneksi, "SELECT * FROM produk");		
                    }
                    while($dataProduk = mysqli_fetch_array($data)){
            ?>
        <div class="container">
            <div class="card">
                <div class="head-card">
                    <img src="assets/img/personal/img2.jpg" alt="" srcset="">
                </div>
                <div class="body-card">
                    <h1><?php echo $dataProduk['nm_produk']?></h1>
                    <p><?php echo $dataProduk['stock']?> <?php echo $dataProduk['satuan']?></p>
                    <h3>Rp. <?php echo number_format($dataProduk['harga'])?></h3>
                    <div class="buy">
                        <a href="pesan-produk.php?kode=<?php echo $dataProduk['id_produk'] ?>">Pesan</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </form>

</body>
</html>