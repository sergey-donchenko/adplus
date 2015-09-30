<?php 
class FieldsSeeder extends Seeder {

    public function run()
    {
        DB::table('fields')->delete();

        Field::create(array('id' => 1, 'id_field_set' => 1, 'id_field_type' => 8, 'title' => 'Rooms', 'hint' => 'Amount Of Rooms', 'pos' => 0));
        Field::create(array('id' => 2, 'id_field_set' => 1, 'id_field_type' => 8, 'title' => 'Level', 'hint' => '# Of Level', 'pos' => 1));
        
        // $this->command->info('Fields table was seeded!');      
    }
}