<?php
require_once "config.php";

$curl = curl_init();
$reference = isset($_GET['reference']) ? $_GET['reference'] : '';
if(!$reference){
	die('No reference supplied');
}

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_HTTPHEADER => [
		"accept: application/json",
		"authorization: Bearer sk_test_552f2141816852268c1a50b0f116ecfa282db5d2",
		"cache-control: no-cache"
	],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
	// there was an error contacting the Paystack API
	die('Curl returned error: ' . $err);
}

$tranx = json_decode($response);

if(!$tranx->status){
  // there was an error from the API
	die('API returned error: ' . $tranx->message);
}

if('success' == $tranx->data->status){
  // transaction was successful...
  // please check other things like whether you already gave value for this ref
  // if the email matches the customer who owns the product etc
  // Give value
	$details = json_decode($_SESSION["details"]);
	$sql = json_decode($obj->getRideDetails("passDetails",user,'',mt));
	$gs = $sql[0];
	$fname = $gs->first_name." ".$gs->lastname;
	$email = $gs->email;
	$sql = $obj->update(tr,array('customer_id','customer_name','amount','email'),array(user,$fname,$details->amount,$email));
	if (isset($sql->_sucMsg)) {
		unset($_SESSION['details']);
		$num = 2;
		header('Location: ../../trans?id='.$reference."&rid=".$details->tid."&p=".$num);
	}
}	
?>