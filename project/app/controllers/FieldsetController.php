<?php

class FieldsetController extends \BaseController {	

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$aFieldsSet = FieldSet::all();		

		return View::make('fieldset.index', array( 'aFieldsSet' => $aFieldsSet ));
	}	
}
