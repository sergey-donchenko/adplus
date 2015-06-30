<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('FieldTypeSeeder');
		$this->call('FieldSetSeeder');

		$this->command->info('User table seeded!');
	}
}


class UserTableSeeder extends Seeder 
{
	/**
	 * Run the database seeds
	 *
	*/
	public function run() 
	{
		DB::table('users')->delete();

		User::create(array(
			'user_prefix' => 'Mr', 
			'user_firstname' => 'John', 
			'user_lastname' => 'Dev', 
			'password' => Hash::make('password'), 
			'user_display_name' => 'Admin', 
			'user_company_name' => 'AdPlus', 
			'user_is_active' => '1', 
			'user_email' => 'admin@custom.com'
		));	
	}
}
