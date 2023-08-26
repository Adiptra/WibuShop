<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>
    <link rel="stylesheet" href="css/admin.css?<?php echo time()?>" />
  </head>
  <body>
    <!--navbar-->
    <nav>
      <div class="logo">Wibu'Shop</div>
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

    <!--homepage-->
    <section class="homepage">
      <div class="admin">SELAMAT DATANG <?php echo $_SESSION['username']?> !!!</div>
      <div class="perusahaan">
        <h2>PT. Adi Makmur Kurang Jaya</h2>
        <h3>Sell Product Tecnology</h3>
        <p>Jl. Bekasi Timur IV</p>
        <p>m.farhan8417@gmail.com [085718467572] | www.Wibu'Shop.com</p>
      </div>
    </section>

    <pre><?php print_r($_SESSION)?></pre>
    <!--homepage-->
  </body>
</html>
