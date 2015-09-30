<?php 
class CategorySeeder extends Seeder {

    public function run()
    {
        DB::table('categories')->delete();

        Category::create(array(
        	'id' => 1, 
        	'name' => 'Appartments', 
        	'description' => 'Description for the Appartments Category', 
        	'parent_id' => 0, 
        	'level' => '1', 
        	'id_fieldset' => 1 // it's an Appartment 
        ));
        
        // $this->command->info('FieldSet table was seeded!');       
    }
}