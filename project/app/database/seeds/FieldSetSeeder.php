<?php 
class FieldSetSeeder extends Seeder {

    public function run()
    {
        DB::table('fields_set')->delete();

        FieldSet::create(array('name' => 'Appartments'));
        FieldSet::create(array('name' => 'Houses'));
        FieldSet::create(array('name' => 'Cars'));        
        FieldSet::create(array('name' => 'Pets'));        
    }
}