<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('name', 255);
			$table->string('cover_image', 255);
			$table->string('icon_image', 255);
			$table->text('short_description');
			$table->longText('description');
			$table->string('page_title', 255);

			$table->text('meta_keywords');
			$table->text('meta_description');

			$table->unsignedInteger('parent_id');
			$table->string('lang', 10);			
			$table->string('path', 255);		
			$table->unsignedInteger('position');
			$table->integer('level');
			$table->unsignedInteger('children_count');
			$table->char('is_active', '1')->default('0');

			$table->timestamps();
			$table->softDeletes();			

			$table->engine = 'InnoDB';
			$table->index(array('lang', 'level'), 'indx_categories_level');
			$table->index(array('lang', 'path'), 'indx_categories_path');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
	}

}
