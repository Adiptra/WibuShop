<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include_once('../config.php');
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$pw = $_POST['pw'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"SELECT * FROM admin where username='$username' and pw='$pw'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['pw'] = $pw;
	$_SESSION['status'] = "login";
	header("Location: ../admin/admin.php");
}else{
	header("Location: ../login-admin.php?pesan=gagal");
}


// function cek_status($username){
// 	global $link;
// 	$nama =escape($username);

//     $query = "SELECT role FROM log WHERE username='$username'";

// 	if
?>