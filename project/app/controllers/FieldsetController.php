<?php

class FieldsetController extends \BaseController {	

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$aFieldsSet = FieldSet::orderBy('name', 'asc')->paginate( Config::get('view.paginationLimit') );	

		return View::make('fieldset.index', array( 'aFieldsSet' => $aFieldsSet, 'currPage' => Input::get('page') ));
	}

	/**
	 * New / Edit form for FieldSet
	 *
	*/
	public function getForm( $id = 0, $page = 0 )
	{
		$aFieldsSet = array();

		if ( $id > 0 ) {
			$oFieldSet = FieldSet::find( $id );

			if ( $oFieldSet )  {
				$aFieldsSet = $oFieldSet->toArray();	
			}
			
		}

		return View::make('fieldset.form', array( 'aFieldset' => $aFieldsSet ));	
	}

	/**
	 * Save FieldSet
	*/	
	public function save()
	{
		Input::flash();
		$validator = Validator::make(Input::all(), FieldSet::$aRules );

		if ( $validator->fails() ) {
            return Redirect::route('admin.fieldset.form')
                ->withErrors( $validator );
        } else 
        if( $validator->passes() ) {
        	$iId = Input::get('fieldset_id');			

			if ( $iId ) {
				$oField = FieldSet::find( $iId );		
			} else {
				$oField = new FieldSet();
			}

			$oField->name        = Input::get('fieldset_name');
			$oField->description = Input::get('fieldset_descr');
			$oField->is_active   = Input::get('fieldset_is_active');

			// Saving
			$iFieldsetId = $oField->save();		

        }

        Session::flash('message', 'Fieldset was successfully updated!');

	    return Redirect::route('admin.fieldset');
	}

}
