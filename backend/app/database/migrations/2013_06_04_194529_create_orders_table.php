<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->decimal('amount', 16, 8);
			$table->decimal('amount_received', 16, 8)->nullable();
			$table->decimal('amount_sent', 16, 8)->nullable();
			$table->string('receive_address', 34);
			$table->string('send_address', 34);
			$table->string('transaction_id', 250)->nullable();
			$table->string('order_key', 40);
			$table->boolean('confirmed')->default(0);
			$table->integer('confirmations')->default(0);		
			$table->string('ip', 100);
			$table->integer('checks')->default(0);
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
