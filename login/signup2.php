<?php
    include 'koneksi.php';
    $username       ="";
    $password       ="";
    $sukses         ="";
    $err            ="";
    $alert          ="";
    $email          ="";
    $ttl            ="";

    if(isset($_POST['simpan'])){
        $username = $_POST['username'];
        $password = $_POST['pw'];
    
        if($username && $password){
            $sql1 = "INSERT INTO admin (username, pw) values ('$username', '$password')";
            $q1 = mysqli_query($koneksi,$sql1);
            if($q1){    
                header('location: index.php?=berhasil-signup');
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
                            <label for="username" class="form-label">Username</label>
                            <input placeholder="Masukkan Username Anda" type="text" class="form-control" id="username" name="username" value="<?php echo $username?>" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input placeholder="Masukkan Password Anda" type="password" class="form-control" name="pw" value="<?php echo $password?>" id="pw">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" onclick="showPW()" id="show">
                            <label class="form-check-label" for="show">Show Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-3" name="simpan">Submit</button>
                    </form>
                    <p>Sudah Punya Akun? <a href="../login-admin.php" style="text-decoration: none;">Login</a></p>
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