<?php 
class FieldSetSeeder extends Seeder {

    public function run()
    {
        DB::table('fields_set')->delete();

        FieldSet::create(array('id' => 1, 'name' => 'Appartments', 'description' => 'Description for the Appartments'));
        FieldSet::create(array('id' => 2, 'name' => 'Houses', 'description' => 'Description for the Houses'));
        FieldSet::create(array('id' => 3, 'name' => 'Cars', 'description' => 'Description for the Cars'));        
        FieldSet::create(array('id' => 4, 'name' => 'Pets', 'description' => 'Description for the Pets')); 

        // $this->command->info('FieldSet table was seeded!');       
    }
}