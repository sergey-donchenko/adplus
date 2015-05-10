<?php

class Settings extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'settings';

	protected $primaryKey = 'id';

	protected $guarded = array();


	public static $aRules = array(
		'site_name' => 'required|min:5',
		'contact_email' => 'required|email|min:5',
		'contact_phone'  => 'phone:US,BE,UA',		 // https://github.com/Propaganistas/Laravel-Phone
		'contact_country'  => 'required_with:contact_phone',
	);	

	/**
	 * Build the custom set of rules 
	*/
	public static function getCustomRules( $aData ) {
		$aRules = self::$aRules;

		if ( isset($aData['contact_country']) ) {
			$aRules['contact_phone'] = 'phone:' . $aData['contact_country'];
		}

		return $aRules;		
	}
	
}
