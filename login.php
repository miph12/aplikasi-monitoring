<?php
  include ("koneksi.php");
   error_reporting(0);
session_start();
if (!empty($_SESSION['username']) AND !empty($_SESSION['password'])) {
  header('location:index.php');
}


if(isset($_POST['login'])){

$username = $_POST[username];
$pass     = $_POST[password];

$login = mysqli_query($conek, "SELECT * FROM anggota WHERE email='$username' AND password='$pass'");
$ketemu= mysqli_num_rows($login);
$r = mysqli_fetch_array($login);
if (mysqli_num_rows($login) == 1) {
    //kalau username dan password sudah terdaftar di database
    //buat session dengan nama username dengan isi nama user yang login
    session_start();
    $_SESSION[username]         = $r[email];
    $_SESSION[password]         = $r[password];
    $_SESSION[bagian]            = $r[bagian];
    $_SESSION[nama_anggota]            = $r[nama_anggota];
    
    //redirect ke halaman index
    header('location:index.php');
} else {
    //kalau USERNAME ataupun PASSWORD tidak terdaftar di database
    echo "<script>alert('maaf anda gagal login...!!');</script>";
}

}

?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Sistem Informasi</title>
    
    
    
    <link rel='stylesheet prefetch' href='http://daneden.github.io/animate.css/animate.min.css'>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,400italic,700italic,700'>

        <link rel="stylesheet" href="style3.css">

    
    
    
  </head>

  <body>

    <div class='form animated flipInX'>
  <h2>Login </h2>
  <form action="" method="POST">
    <input placeholder='Email' name="username" type='text'>
    <input placeholder='Password' type='password' name="password" >
    <button name="login"  class='animated infinite pulse'>Login</button>
  </form>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="index.js"></script>

    
    
    
  </body>
</html>
