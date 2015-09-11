<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategoryFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category_fields', function(Blueprint $table)
		{
			$table->increments('id');			

			$table->integer('id_category')->unsigned()->default(NULL);
			$table->integer('id_field')->unsigned()->default(NULL);

			$table->timestamps();

			$table->foreign('id_category', 'fgk_category_id_category')
				->references('id')->on('categories')
				->onUpdate('cascade')
		        ->onDelete('cascade');

		    $table->foreign('id_field', 'fgk_field_id_fields')
				->references('id')->on('fields')
				->onUpdate('cascade')
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
		Schema::dropIfExists('category_fields');
	}

}
