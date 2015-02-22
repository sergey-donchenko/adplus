<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('user_id');
			$table->string('user_prefix', 5);
			$table->string('user_firstname', 32);
			$table->string('user_lastname', 32);
			$table->string('user_email', 128)->unique();
			$table->string('user_password', 100);
			$table->string('user_icon', 150);
			$table->string('user_display_name', 100);
			$table->string('user_company_name', 100);
			$table->string('user_website', 150);
			$table->string('user_address', 150);
			$table->string('user_phone', 100);
			$table->string('user_mobile_phone', 100);
			$table->string('user_fax', 100);
			$table->text('user_info');
			$table->timestamp('user_last_login');

			// create two fields: created_at and updated_at
			$table->timestamps();
			$table->softDeletes();
			$table->char('user_is_active', '0');

			$table->engine = 'InnoDB';
			$table->index(array('user_email', 'user_password'), 'indx_users_email_pass');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{	
		Shema::dropIfExists('users');
	}

}
