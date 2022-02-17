<?php
include ('koneksi.php');
error_reporting(0);
//$user = new User();
//if (!$user->get_sesi())
{
//header("location:index.php");
}
$page=htmlentities($_GET['page']);
$halaman="$page.php";

if(!file_exists($halaman) || empty($page)){
	include "awal.php";
}else{
	include "$halaman";
}
?>
