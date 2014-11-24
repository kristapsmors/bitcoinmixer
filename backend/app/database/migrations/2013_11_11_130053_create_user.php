<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Creates the users table
        Schema::create('users', function($table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('confirmation_code');
            $table->boolean('admin')->default(false);
            $table->boolean('status')->default(true);
            $table->text('comment');
            $table->boolean('confirmed')->default(true);
            $table->timestamps();
        });

        // Creates password reminders table
        Schema::create('password_reminders', function($table)
        {
            $table->engine = 'InnoDB';

            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at');
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('password_reminders');
        Schema::drop('users');
	}

}
