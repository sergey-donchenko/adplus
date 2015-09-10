<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPasswordField extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table) {			
			if ( Schema::hasColumn('users', 'user_password') ) {	
				$table->renameColumn('user_password', 'password');
			}	
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		if ( Schema::hasColumn('users', 'password') ) {	
			Schema::table('users', function(Blueprint $table) {				
				$table->renameColumn('password', 'user_password');								
			});
		}
	}

}
