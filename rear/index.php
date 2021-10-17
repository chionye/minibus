<?php 
include '../assets/system/config.php'; 
if (!isset($_SESSION['admin'])) {
	header('location:login.php');
}else{
	header('location:dashboard.php');
}
?>