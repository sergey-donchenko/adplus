<?php 
class FieldTypeSeeder extends Seeder {

    public function run()
    {
        DB::table('fields_types')->delete();

        FieldType::create(array('id' => 1, 'title' => 'Text Field', 'ident' => 'varchar'));
        FieldType::create(array('id' => 2, 'title' => 'Textarea', 'ident' => 'text'));
        FieldType::create(array('id' => 3, 'title' => 'Checkbox', 'ident' => 'varchar'));
        FieldType::create(array('id' => 4, 'title' => 'Radio Button', 'ident' => 'varchar'));
        FieldType::create(array('id' => 5, 'title' => 'List', 'ident' => 'varchar'));
        FieldType::create(array('id' => 6, 'title' => 'Date', 'ident' => 'date'));
        FieldType::create(array('id' => 7, 'title' => 'Price', 'ident' => 'float'));
        FieldType::create(array('id' => 8, 'title' => 'Number', 'ident' => 'int'));

        // $this->command->info('FieldType table was seeded!'); 
    }
}