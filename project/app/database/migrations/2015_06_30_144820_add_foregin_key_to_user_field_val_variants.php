<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeginKeyToUserFieldValVariants extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fields_val_variants', function(Blueprint $table)
		{
			$table->integer('id_field')->unsigned()->after('value');

			$table->foreign('id_field')
				->references('id')->on('fields')
		        ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fields_val_variants', function(Blueprint $table)
		{
			$table->dropColumn('id_field');
		});
	}

}
