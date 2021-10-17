<?php
require_once("init_pay.php");

$amount = (float)$_POST["amount"];
$nonce = $_POST["payment_method_nonce"];
$tid = $_POST['tid'];

$result = $gateway->transaction()->sale([
	'amount' => $amount,
	'paymentMethodNonce' => $nonce,
	'options' => [
		'submitForSettlement' => true
	]
]);

if ($result->success || !is_null($result->transaction)) {
	$transaction = $result->transaction;
	$num = 1;
	header("Location: ../../trans.php?id=" . $transaction->id."&rid=".$tid."&p=".$num);
}