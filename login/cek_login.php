<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include_once('../config.php');
 
// menangkap data yang dikirim dari form
$nm_pelanggan = $_POST['nm_pelanggan'];
$pw = $_POST['pw'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"SELECT * FROM pelanggan where nm_pelanggan='$nm_pelanggan' and pw='$pw'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$akun = mysqli_fetch_assoc($data);
	$_SESSION['pelanggan'] = $akun;
	header("Location: ../home.php");
}else{
	header("Location: ../login-user.php?pesan=gagal");
}



?>