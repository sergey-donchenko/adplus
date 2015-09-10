<?php

class FieldSet extends Eloquent {
	use SoftDeletingTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'fields_set';

	protected $primaryKey = 'id';

	protected $guarded = array();

	/**
	 * Custom fields
	 *
	 * @var array
	*/
	protected $appends = array( 'fields' );

	public static $aRules = array(
		'fieldset_name' => 'required|min:3'
	);

	/**
	 * Implementation for the append item 'children'
	 *
	*/
	public function getFieldsAttribute() 
	{
		return Field::where('id_field_set', '=', $this->id )
			->select(
				'fields.id as id',
				'fields.pos as pos',
				'fields.title as title',
				'fields_types.title as field_type'
			)
			->join('fields_types', 'fields.id_field_type', '=', 'fields_types.id')
			->orderBy('pos')
			->get();
	}
	
}
