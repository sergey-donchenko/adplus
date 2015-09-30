<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsSetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fields_set', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 255);			
			$table->text('description');			
			$table->string('lang', 10)->default('en');
			$table->char('is_active', 1)->default('1');
			$table->timestamps();
			$table->softDeletes();

			$table->engine = 'InnoDB';
			$table->index(array('lang', 'name'), 'indx_fieldset_name');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('fields_set');
	}

}
