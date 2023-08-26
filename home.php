<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css?<?php echo time()?>">
    <title>Website Penjualan</title>
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
            <h1>Selamat Datang di Wibu'Shop</h1>
        </div>

        <div class="content-header">
            <p>Selamat Datang di Toko Kami, Hai Para Wibu!!!</p>
            <br>
            <div class="btn">
                <a href="produk.php">
                    Mulai
                </a>
            </div>
        </div>
        <div class="img">
                <img src="assets/img/personal/img1.png" alt="" srcset="">
        </div>
    </div>
</body>
</html>