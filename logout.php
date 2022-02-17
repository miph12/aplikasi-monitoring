<?php
session_start();
session_destroy();

//redirect ke halaman login
header('location:login.php');
?>
