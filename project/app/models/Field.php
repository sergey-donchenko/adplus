<?php

class Field extends Eloquent {
	use SoftDeletingTrait;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'fields';

	protected $primaryKey = 'id';

	protected $guarded = array();

	/**
	 * Validation rules
	 *
	 * @var array
	*/
	public static $aRules = array(
		'field_name' => 'required|min:3'
	);	
}
