<?php 
session_start();
include_once 'processes.php';
define('wh',' where id = ');
define("adt","administrators");
define("cpn","coupons");
define("ann","announcements");
define("drv","driver");
define("drva","accounts");
define("mt","main_table");
define("rd","rides");
define("vh","vehicles");
define("per","percentage");
define("ins","instructions");
define("tr","transaction");
define("sel","select * from ");
define("API_KEY", "AIzaSyCS-qW1nA2XUiwcpM9MhmHWF0mXgZ7ozc8");
define("environment", "sandbox");
define("merchantId", "mvpf9s9ngyhzmpky");
define("publicKey", "qgty25wj8c7j63p4");
define("privateKey", "d626dfd4cf39b70995fd3a6339d3d6c0");
define("STRIPE_SECRET_KEY", "sk_test_51HAFkOBEtJ7sKoXi0v5TY5cdzT7mqt4iwNfV47b1ICV6gfI8wfI5ImTZTVhHZTRXLOBqGVgdVtbbrDcXS9X2m5ZP0012PXJQ3r");
define("STRIPE_PUBLISHABLE_KEY", "pk_test_51HAFkOBEtJ7sKoXiyFqAgojrkpLl0fAAUHlM8PeSw3UoIIwywW3AQxtNoNTLJC6YK7Sgv06Thr0XEq9sWd8qCSvw00wRrhWfQE");

$obj = new processes();

if(isset($_SESSION['uid'])){
	define('user',$_SESSION['uid']);
}
if(isset($_SESSION['driver'])){
	define('driver',$_SESSION['driver']);
}
?>