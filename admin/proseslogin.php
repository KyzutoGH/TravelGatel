<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include '../bagian/koneksi.php';
 
// menangkap data yang dikirim dari form login
$user = $_POST['user'];
$pass = md5($_POST['pass']);
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from administrasi where username='$user' and password='$pass'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
  $data = mysqli_fetch_assoc($login);
 
    // buat session login dan username
    $_SESSION['user'] = $user;
    $_SESSION['status'] = "login";
    $_SESSION['role'] = "admin";
    // alihkan ke halaman dashboard admin
    header("location:../admin/index.php?submenu=Armada");
}else{
  echo "ERROR 2";
}
 