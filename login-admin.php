<?php
    include_once('config.php');
    $username       ="";
    $password       ="";
    $sukses         ="";
    $err            ="";
    $alert          ="";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="admin/favicon_and_logo-removebg-preview.png" rel="icon" />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			$err = "Username and Password Invalid!";
		}else if($_GET['pesan'] == "logout"){
			$sukses = "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			$alert = "Anda harus login untuk mengakses halaman admin";
		}
	}
	?>
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
                    <img src="assets/img/personal/4d.png" alt="" class="img-fluid">
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                <h2 class="text-center">Login Admin</h2>
                    <form action="login/cek_login2.php" method="post">
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
                        <button type="submit" class="btn btn-primary w-100 mb-3" >Submit</button>
                    </form>
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