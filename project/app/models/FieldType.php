<?php

class FieldType extends Eloquent {
	use SoftDeletingTrait;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'fields_types';

	protected $primaryKey = 'id';

	protected $guarded = array();

	
}
