<?php

class FieldSet extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'fields_set';

	protected $primaryKey = 'id';

	/**
	 * Validation rules
	 *
	 * @var array
	*/
	public static $aRules = array(
		'fieldset_name' => 'required|min:3'
	);	

	protected $guarded = array();

	
}
