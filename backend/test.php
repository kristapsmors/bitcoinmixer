<?php
require_once 'includes/jsonRPCClient.php';

$bitcoin = new jsonRPCClient('http://bcuserQQ:YF9S71UiaZ@127.0.0.1:8332/');

$info = $bitcoin->getinfo();
print_r($info);

//$bitcoin->sendfrom('outbox', $order->send_address, $amount_received * 0.99);

$bitcoin2 = new jsonRPCClient('http://bcuserQQ:YF9S71UiaZ@127.0.0.1:8334/');

$info2 = $bitcoin2->getinfo();
$address2 = $bitcoin2->getaccountaddress('');

var_dump($info2);
//var_dump($address2);
//var_dump($bitcoin2->listaccounts());
?>