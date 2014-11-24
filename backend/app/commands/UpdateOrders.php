<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class UpdateOrders extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'command:update-orders';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Checks for completed orders and sends coins.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{

		require_once '/home/maxtraff/maxtraffic.eu/bitcoin/includes/jsonRPCClient.php';

		$bitcoin = new jsonRPCClient('http://bcuserQQ:YF9S71UiaZ@127.0.0.1:8332/');

		$bitcoin2 = new jsonRPCClient('http://bcuserQQ:YF9S71UiaZ@127.0.0.1:8334/');


		$transactions = $bitcoin->listreceivedbyaddress();

		foreach($transactions AS $transaction) {

			// Get received transactions
			if($transaction['account'] == '') {

				$order = Order::where('confirmed', '=', 0)->where('receive_address', '=', $transaction['address'])->first();
				if(!empty($order)) {

					$order->confirmations = $transaction['confirmations'];
					$order->amount_received = $transaction['amount'];

					// Send money to user
					if($transaction['confirmations'] >= 6) {

						$transaction_id = $bitcoin2->sendfrom('outbox', $order->send_address, $transaction['amount'] * 0.99);

						if($transaction_id) {
							$order->transaction_id = $transaction_id;
							$order->amount_sent = $transaction['amount'] * 0.99;
							$order->confirmed = 1;	
						}

					}
					$order->save();
				}
			}			
		}
		
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		
		return array(
			//array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
		
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		
		return array(
			//array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
		
	}

}