<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->string('remember_token', 100)->after('user_password')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		if ( Schema::hasColumn('users', 'remember_token') ) {			
			Schema::table('users', function(Blueprint $table) {
				$table->dropColumn('remember_token');
			});
		}	
	}

}
