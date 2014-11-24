<?php

class ApiController extends Controller {


	public function index()
	{

		// Get post vars
		$amount = Input::get('amount');
		$address = Input::get('address');
		$ip = Input::get('ip');

		require_once '../includes/jsonRPCClient.php';

		$bitcoin = new jsonRPCClient('http://bcuserQQ:YF9S71UiaZ@127.0.0.1:8332/');


		$response['error'] = true;
		$validate_address = $bitcoin->validateaddress($address);

		// Validate user address
		if(!empty($validate_address['isvalid']) && ($validate_address['isvalid'] == 1)) {
			

			$new_address = $bitcoin->getnewaddress();
			

			$order_key = sha1(microtime(true).mt_rand(10000,90000));

			// Create new order
			$order = new Order;
			$order->amount = $amount;
			$order->receive_address = $new_address;
			$order->send_address = $address;
			$order->ip = $ip;
			$order->order_key = $order_key;
			$order->save();

			$response['error'] = false;
			$response['order_key'] = $order_key;
			$response['message'] = '';


		} else {
			$response['message'] = 'Invalid return address!';	
		}

		return Response::json($response);
	}

}
