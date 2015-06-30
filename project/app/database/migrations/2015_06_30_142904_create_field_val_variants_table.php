<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldValVariantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fields_val_variants', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('value', 100);
			$table->char('is_default',1)->default('0');
			$table->integer('pos')->default(0);
			$table->string('lang', 10)->default('en');			
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fields_val_variants');
	}

}
