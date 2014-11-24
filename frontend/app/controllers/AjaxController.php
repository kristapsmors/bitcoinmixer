<?php

class AjaxController extends BaseController {


	public function index()
	{

		// Get post vars
		$amount = str_replace(',', '.', Input::get('order_amount'));
		$address = Input::get('order_address');

		// Get user ip
		$ip = ip2long(Request::getClientIp());

		$response['error'] = true;
		$response['return_address'] = $address;
		$response['amount'] = $amount;
		$response['message'] = 'Something went wrong, try again...';

		if(empty($amount) || !is_numeric($amount)) {

			$response['message'] = 'Please enter valid amount!';

		} else if($amount < 0.05) {

			$response['message'] = 'Enter amount greater than 0.05';
	
		} else if(empty($address)) {

			$response['message'] = 'Enter your Bitcoin address, where to send mixed Bitcoins';

		} else {
			// Send request to backend api

			$request_url = "http://bitcoin.dev/api/v1/?key=T3rNO5bU9U&ip={$ip}&amount={$amount}&address={$address}";
			//echo $request_url;
			$serve_response = json_decode(file_get_contents($request_url));

			$response['error'] = $serve_response->error;
			$response['order_key'] = !empty($serve_response->order_key) ? $serve_response->order_key : false;
			$response['message'] = $serve_response->message;
		}

		return Response::json($response);
	}

}