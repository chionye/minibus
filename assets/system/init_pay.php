<?php 
require_once 'paypal/braintree/lib/autoload.php';
require_once 'config.php';

$gateway = new Braintree_Gateway([
	'environment' => environment,
	'merchantId' => merchantId,
	'publicKey' => publicKey,
	'privateKey' => privateKey
]);
?>