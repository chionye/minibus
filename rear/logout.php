<?php 
include '../assets/system/config.php';
unset($_SESSION);
session_destroy();
header('location:login.php');
?>