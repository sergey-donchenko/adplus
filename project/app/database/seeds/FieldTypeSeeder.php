<?php 
class FieldTypeSeeder extends Seeder {

    public function run()
    {
        DB::table('fields_types')->delete();

        FieldType::create(array('title' => 'Text Field', 'ident' => 'varchar'));
        FieldType::create(array('title' => 'Textarea', 'ident' => 'text'));
        FieldType::create(array('title' => 'Checkbox', 'ident' => 'varchar'));
        FieldType::create(array('title' => 'Radio Button', 'ident' => 'varchar'));
        FieldType::create(array('title' => 'List', 'ident' => 'varchar'));
        FieldType::create(array('title' => 'Date', 'ident' => 'date'));
        FieldType::create(array('title' => 'Price', 'ident' => 'float'));
        FieldType::create(array('title' => 'Number', 'ident' => 'int'));
    }
}