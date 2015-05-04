<?php

class ApplicationController extends \BaseController {

	/**
	 * Retrieve the application settings to the JSON object
	 *
	 * 
	*/
	public function settings( $name = null )
	{
		$aResponce = $this->_aResponse;

		$aResponce['status'] = true;			
		$aResponce['data']   = array(
			'application' => array(
				'base_url' => Config::get('app.url'),
				'timezone' => Config::get('app.timezone'),
				'locale' => Config::get('app.locale'),
			)	
		);		

		return Response::json($aResponce);
	}
}	