<?php
include '../config.php';
$query = mysqli_query($koneksi, "SELECT max(id_produk) as kodeTerbesar FROM produk");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
 
// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodeBarang, 3, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "BR";
$kodeBarang = $huruf . sprintf("%04s", $urutan);

if(isset($_POST['simpan'])){
  $insert = mysqli_query($koneksi, "INSERT INTO produk VALUES ('".$_POST['id_produk']."', '".$_POST['nm_produk']."', '".$_POST['satuan']."', '".$_POST['harga']."', '".$_POST['stock']."')" );
  
      if($insert){
          header('location: data-produk.php?=data-berhasil-disimpan');
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
    <link rel="stylesheet" href="css/data-master.css?<?php echo time() ?>" />
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
          <a href="data-pelanggan.php">Data Master</a>
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
            <input class="read" type="text" name="id_produk" value="<?php echo $kodeBarang ?>" readonly placeholder="Kode Produk">
            <input type="text" name="nm_produk" placeholder="Nama Produk">
            <input type="text" name="satuan" placeholder="Satuan">
            <input type="text" name="harga" placeholder="Harga">
            <input type="text" name="stock" placeholder="Stock">
            <input type="submit" value="Upload" name="simpan">
          </form>
        </div>
      </div>

      <!--tittle-->
      <div class="title">
        <h1>Master Produk</h1>
        <div class="data-master">
          <a href="data-produk.php" style="background-color:#fff; color:#002B5B;">Data produk</a>
          <a href="data-pelanggan.php">Data pelanggan</a>
        </div>
      </div>
      <!--table-->
      <table>
        <tr>
          <th>No</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Satuan</th>
          <th>Stock</th>
          <th>Harga</th>
          <th>
            <p class="openbtn" onclick="openForm()">+ Tambah Data</p>
          </th>
        </tr>
        <?php
          $nomor = 1;
          $q1 = mysqli_query($koneksi, "SELECT * FROM produk");
          while($hasil = mysqli_fetch_array($q1)){
        ?>
        <tr>
          <td><?php echo $nomor++ ?></td>
          <td><?php echo $hasil['id_produk']?></td>
          <td><?php echo $hasil['nm_produk']?></td>
          <td><?php echo $hasil['satuan']?></td>
          <td>Rp. <?php echo number_format($hasil['harga'])?></td>
          <td><?php echo $hasil['stock']?></td>
          <td>
            <a href="edit-produk.php?kode=<?php echo $hasil['id_produk']?>">Edit</a>
            <a href="?kode=<?php echo $hasil['id_produk'] ?>">Hapus</a>
          </td>
        </tr>
        <?php
          }
        ?>
        <?php 
        if(isset($_GET['kode'])){
            $hapus = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk = '".$_GET['kode']."' ");

            if($hapus){
                echo "<meta http-equiv=refresh content=2;URL='data-produk.php'>'";
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
        document.getElementById('myOverlay').style.display = 'block';
      }
    </script>
    <script>
      function closeForm() {
        document.getElementById('myOverlay').style.display = 'none';
      }
    </script>
    <!--js-->
  </body>
</html>
