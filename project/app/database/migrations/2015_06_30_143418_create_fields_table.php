<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fields', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_field_set')->unsigned();
			$table->integer('id_field_type')->unsigned();
			$table->string('title', 100);
			$table->string('hint', 100);
			$table->integer('pos')->default(0);
			$table->string('lang', 10)->default('en');
			$table->char('is_searchable', 1)->default('0');
			$table->char('is_filterable', 1)->default('0');
			$table->char('is_sortable', 1)->default('0');
			$table->char('is_used_in_list', 1)->default('0');
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('id_field_type', 'fgk_field_type')
				->references('id')->on('fields_types')
		        ->onDelete('cascade');

			$table->foreign('id_field_set', 'fgk_field_set')
		        ->references('id')->on('fields_set')
		        ->onDelete('cascade');

		    $table->index(array('lang', 'title'), 'indx_fields_title');
		    $table->engine = 'InnoDB';		    
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		if (Schema::hasTable('fields')) {

			Schema::table('fields', function(Blueprint $table) {
				$foreignKeyNames = array( 'fgk_field_type', 'fgk_field_set');

				foreach( $foreignKeyNames as $fKey ) {					
					$table->dropForeign( $fKey );					
				}	
			});

			Schema::dropIfExists('fields');
		}	
	}

}
