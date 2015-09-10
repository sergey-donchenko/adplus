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

			$table->foreign('id_field', 'fgk_fields_variants')
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
		if ( Schema::hasColumn('fields_val_variants', 'id_field') ) {			
			Schema::table('fields_val_variants', function(Blueprint $table) {
				// Drop foregin key for the field
				$table->dropForeign( 'fgk_fields_variants' );

				//Drop the field
				$table->dropColumn('id_field');			
			});
		}		
	}

}
