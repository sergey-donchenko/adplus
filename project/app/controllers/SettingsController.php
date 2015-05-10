<?php

class SettingsController extends \BaseController {	

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function edit( $tab = null )
	{
		$_aSettings = Settings::all();
		$aSettings  = array();

		if ( $_aSettings ) {
			foreach( $_aSettings->toArray() as $sKey => $mVal ) {
				$aSettings[ $mVal['name'] ] = $mVal['value'];
			}
		}		
				
		return View::make('settings.edit', array( 'aSettings' => $aSettings ));
	}

	/**
	 * Handle saving settings
	 *
	*/
	public function save()
	{
		Input::flash();
		$aFields = Input::all();		

		$validator = Validator::make(Input::all(), Settings::getCustomRules( $aFields ) );

		if ($validator->fails()) {
            return Redirect::route('admin.settings')
                ->withErrors( $validator );
        } else
		if( $validator->passes() ) {			
			$aIgnored = array('_token');

			foreach( $aFields as $sKey => $mVal ) {
				if ( !in_array($sKey, $aIgnored ) ) {								
					$setting = Settings::firstOrCreate(array('name' => $sKey));

					$setting->name = $sKey;
					$setting->value = $mVal;

					$setting->save();					
				}				
			}			

			Session::flash('message', 'Settings were successfully updated!');

	        return Redirect::route('admin.settings');
	    }    
	}

}
