<?php

class UserTableSeeder extends Seeder {

	public function run()
	{

		$user = array(
			'name' => 'Super admin',
                  'email' => 'admin@example.com',
                  'password' => Hash::make('password'),
                  'confirmed' => 1,
                  'confirmation_code' => md5(microtime().Config::get('app.key')),
                  'admin' => 1,
                  'status' => 1,
                  'created_at' => new DateTime,
                  'updated_at' => new DateTime,
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($user);
	}

}
