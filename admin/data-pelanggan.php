<?php
include '../config.php';

$query = mysqli_query($koneksi, "SELECT max(id_pelanggan) as kodeTerbesar FROM pelanggan");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
 
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;

$huruf = "P";
$kodeBarang = $huruf . sprintf("%04s", $urutan);

if(isset($_POST['simpan'])){  
  $insert = mysqli_query($koneksi, "INSERT INTO pelanggan VALUES ('".$_POST['id_pelanggan']."', '".$_POST['nm_pelanggan']."', '".$_POST['alamat']."', '".$_POST['telepon']."', '".$_POST['email']."')" );
  
      if($insert){
          header('location: data-pelanggan.php?=data-berhasil-disimpan');
      }else{
          echo "Gagal Memasukkan Data Pelanggan";
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>
    <link rel="stylesheet" href="css/data-master.css" />
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
    <!--homepage-->
    <section class="homepage">
      <!--overlay-->
      <div class="overlay" id="myOverlay">
        <span class="closebtn" onclick="closeForm()" title="close overlay">&#215</span>
        <div class="wrap">
          <h2>Tambah Data</h2>
          <form method="post">
            <input class="read" type="text" name="id_pelanggan" placeholder="ID" value="<?php echo $kodeBarang ?>">
            <input type="text" name="nm_pelanggan" placeholder="Nama Pelanggan">
            <textarea ntype="text" name="alamat" placeholder="Alamat"></textarea>
            <input type="text" name="telepon" placeholder="Telepon">
            <input type="email" name="email" placeholder="Email">
            <input type="submit" name="simpan" value="Upload">
          </form>
        </div>
      </div>
      <!--tittle-->
      <div class="title">
        <h1>Master Pelanggan</h1>
        <div class="data-master">
          <a href="data-produk.php">Data Produk</a>
          <a href="data-pelanggan.php" style="background-color:#fff; color:#002B5B;">Data Pelanggan</a>
        </div>
      </div>
      <!--table-->
      <table>
        <tr>
          <th>No</th>
          <th>Kode Pelanggan</th>
          <th>Nama Pelanggan</th>
          <th>Alamat</th>
          <th>Telepon</th>
          <th>Email</th>
          <th>
            <p class="openbtn" onclick="openForm()">+ Tambah Data</p>
          </th>
        </tr>
        <?php
          $nomor = 1;
          $q1 = mysqli_query($koneksi, "SELECT * FROM pelanggan");
          while($hasil = mysqli_fetch_array($q1)){
        ?>
        <tr>
          <td><?php echo $nomor++ ?></td>
          <td><?php echo $hasil['id_pelanggan'] ?></td>
          <td><?php echo $hasil['nm_pelanggan'] ?></td>
          <td><?php echo $hasil['alamat'] ?></td>
          <td><?php echo $hasil['telepon'] ?></td>
          <td><?php echo $hasil['email'] ?></td>
          <td>
            <a href="edit-pelanggan.php?kode=<?php echo $hasil['id_pelanggan']?>">Edit</a>
            <a href="?kode=<?php echo $hasil['id_pelanggan'] ?>">Hapus</a>
          </td>
        </tr>
        <?php
          }
        ?>
        <?php
        if(isset($_GET['kode'])){
            $hapus = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan = '".$_GET['kode']."' ");

            if($hapus){
                echo "<meta http-equiv=refresh content=2;URL='data-pelanggan.php'>'";
            }else{
                echo "Data Gagal Terhapus";
            }
        }
        ?>
      </table>
    </section>

    <!--homepage-->

    <!--js-->
    <script>
      function openForm() {
        document.getElementById("myOverlay") .style.display ="block";
      }
      </script>
      <script>
      function closeForm() {
        document.getElementById("myOverlay") .style.display ="none";
      }
    </script>
    <!--js-->
  </body>
</html>
