<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		// Remove table
		$this->down();

		Schema::create('fields_types', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('title', 255);
			$table->string('ident', 255);
			$table->string('lang', 10)->default('en');
			$table->timestamps();
			$table->softDeletes();			

			$table->engine = 'InnoDB';			
			$table->index(array('lang', 'title'), 'indx_fieldstype_name');			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('fields_types');			
	}

}
