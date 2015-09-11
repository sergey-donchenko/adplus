<?php 
class CategoryFieldsSeeder extends Seeder {

    public function run()
    {
        DB::table('category_fields')->delete();

        CategoryFields::create(array(
        	'id' => 1, 
        	'id_category' => 1, 
        	'id_field' => 1,         	
        ));

        CategoryFields::create(array(
        	'id' => 2, 
        	'id_category' => 1, 
        	'id_field' => 2,         	
        ));
        
        // $this->command->info('FieldSet table was seeded!');       
    }
}