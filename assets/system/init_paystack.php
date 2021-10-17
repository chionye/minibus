<?php
require 'config.php';
require 'paystack/src/Paystack.php';
require 'paystack/src/autoload.php';

if (isset($_POST['submit'])) {
	extract($_POST);
    $amount = (int)$amount.'00';  // N30000 the amount in kobo. This value is actually NGN 300
    $sql = json_decode($obj->getRideDetails("passDetails",user,'',mt));
    $gs = $sql[0];
    $fname = $gs->first_name." ".$gs->lastname;
    $email = $gs->email;
}
$curl = curl_init();
if ($_SERVER['HTTP_HOST'] == 'localhost') {
	curl_setopt($curl, CURLOPT_CAINFO, 'C:/wamp64/www/minibus/assets/system/paystack/cacert.pem');
}
$callback_url = "localhost/minibus/assets/system/processTrans.php";
curl_setopt_array($curl, array(
	CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => json_encode([
		'amount'=>$amount,
		'email'=>$email,
		'callback_url'=>$callback_url
	]),
	CURLOPT_HTTPHEADER => [
    "authorization: Bearer sk_test_552f2141816852268c1a50b0f116ecfa282db5d2", //replace this with your own test key
    "content-type: application/json",
    "cache-control: no-cache"
],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the Paystack API
	die('Curl returned error: ' . $err);
}

$tranx = json_decode($response, true);

if(!$tranx->status){
  // there was an error from the API
	print_r('API returned error: ' . $tranx['message']);
}

// comment out this line if you want to redirect the user to the payment page
// print_r($tranx);
$arr = ["amount"=>$amount,"tid"=>user];
$_SESSION['details'] = json_encode($arr);

// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $tranx['data']['authorization_url']);