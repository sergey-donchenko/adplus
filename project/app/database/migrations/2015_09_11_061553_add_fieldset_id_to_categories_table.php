<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsetIdToCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('categories', function(Blueprint $table)
		{
			$table->integer('id_fieldset')->unsigned()->nullable()->default(NULL)->after('parent_id');

			$table->foreign('id_fieldset', 'fgk_categories_fieldset')
				->references('id')->on('fields_set')
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
		Schema::table('categories', function(Blueprint $table)
		{
			if ( Schema::hasColumn('categories', 'id_fieldset') ) {
				$table->dropForeign( 'fgk_categories_fieldset' );
				
				$table->dropColumn('id_fieldset');	
			}
		});
	}

}
