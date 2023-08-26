<?php
    include '../config.php';
    $nm_pelanggan       ="";
    $password       ="";
    $id_pelanggan      ="";
    $alamat         ="";
    $sukses         ="";
    $err            ="";
    $alert          ="";
    $email          ="";
    $telepon        ="";
    $query = mysqli_query($koneksi, "SELECT max(id_pelanggan) as kodeTerbesar FROM pelanggan");
    $data = mysqli_fetch_array($query);
    $kodeBarang = $data['kodeTerbesar'];
    
    $urutan = (int) substr($kodeBarang, 3, 3);
    $urutan++;

    $huruf = "P";
    $kodeBarang = $huruf . sprintf("%04s", $urutan);

    if(isset($_POST['simpan'])){
        $nm_pelanggan = $_POST['nm_pelanggan'];
        $password = $_POST['pw'];
        $alamat   = $_POST['alamat'];
        $id_pelanggan = $_POST['id_pelanggan'];
        $email    = $_POST['email'];
        $telepon  = $_POST['telepon'];
    
        if($id_pelanggan && $nm_pelanggan && $alamat && $telepon && $email && $password){
            $sql1 = "INSERT INTO pelanggan (id_pelanggan, nm_pelanggan, alamat, telepon, email, pw) values ('$id_pelanggan', '$nm_pelanggan', '$alamat', '$telepon', '$email', '$password')";
            $q1 = mysqli_query($koneksi,$sql1);
            if($q1){    
                header('location: ../login-user.php?=berhasil-signup');
            }else{
                $err ='Maaf Username sudah ada';
            }
        }else{
            $err ="Silahkan Masukkan Semua Data";
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="admin/favicon_and_logo-removebg-preview.png" rel="icon" />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <?php
        if ($err) {
        ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $err?>
        </div>
        <?php
        }
        ?>
        <?php
        if ($sukses) {
        ?>
        <div class="alert alert-success" role="alert">
            <?php echo $sukses ?>
        </div>
        <?php
        }
    ?>
    <div class="container">
        <div class="box" style="padding: 20px 20px;
        width: 100%;
        font-family: 'Fredoka', sans-serif;">
            <div class="row contentForm" style="margin: 8%" >
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <img src="../assets/img/personal/2d.png" alt="" class="img-fluid">
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                <h2 class="text-center">Sign Up</h2>
                    <form method="post">
                        <div class="mb-3">
                            <label for="id_pelanggan" class="form-label">ID</label>
                            <input placeholder="Masukkan ID Anda" type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?php echo $kodeBarang?>" readonly >
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input placeholder="Masukkan Username Anda" type="text" class="form-control" id="username" name="nm_pelanggan" value="<?php echo $nm_pelanggan?>" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input placeholder="Masukkan alamat Anda" type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat?>" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input placeholder="Masukkan Nomor Telepon Anda" type="text" class="form-control" id= "telepon" name="telepon" value="<?php echo $telepon?>" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input placeholder="Masukkan email Anda" type="text" class="form-control" id="email" name="email" value="<?php echo $email?>" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input placeholder="Masukkan Password Anda" type="password" class="form-control" name="pw" value="<?php echo $password?>" id="password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" onclick="showPW()" id="show">
                            <label class="form-check-label" for="show">Show Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-3" name="simpan">Submit</button>
                    </form>
                    <p>Sudah Punya Akun? <a href="../login-user.php" style="text-decoration: none;">Login</a></p>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
    
        <script>
            function showPW() {
                var x = document.getElementById("password");
                if (x.type == "password") {
                    x.type = "text" 
                }else {
                    x.type = "password"
                }

            }
        </script>
</body>
</html>