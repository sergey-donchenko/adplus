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

	/**
	 * Render the edit page
	*/
	public function edit( $id = null )
	{
		$oFieldsSet = null;

		if ( $id ) {
			$oFieldsSet = FieldSet::find( $id );
		} 
		
		return View::make('fieldset.edit', array('oFieldsSet' => $oFieldsSet));
	}

	/**
	* Delete fields set
	*/
	public function delete( $id ) 
	{
		$fieldSet = new FieldSet();

		if ( $id ) {
			$fieldSet = FieldSet::find( $id );
		}

		if ( empty( $fieldSet ) ) {
			return Redirect::route('admin.fieldset');
		}

		return View::make('common.delete', array(
			'sDeleteMessage' => Lang::get('pages.message.delete', array('object' => ' set of fields')),
			'DeleteTitle' => Lang::get('pages.headers.delete_object', array('object' => ' set of fields: #' . $fieldSet->id.  ' / <b>' . $fieldSet->name . '</b>')),
			'sCancelText' => Lang::get('pages.button.go_back'),
			'sCancelURL' => URL::route( 'admin.fieldset' ),
			'sDeleteURL' => URL::route( 'admin.fieldset.do.delete'),
			'idObject' => $id,
		));
	}

	/**
	* Save the field set
	*/
	public function doSave()
	{
		Input::flash();
		$validator = Validator::make( Input::all(), FieldSet::$aRules);
		$id        = Input::get('fieldset_id');

		if ( $validator->fails() ) {

            return Redirect::route( $id > 0 ? 'admin.field.edit' : 'admin.fieldset.new', array(            	
            	'id' => $id
            ))->withErrors( $validator );

        } else
		if( $validator->passes() ) {	

			if ( $id > 0 ) {
				$fieldSet = FieldSet::find( $id );
			} else {
				$fieldSet = new FieldSet();				
			}

			$fieldSet->name  = Input::get('fieldset_name');
			$fieldSet->description = Input::get('fieldset_description');
			$fieldSet->is_active = Input::get('fieldset_is_active');
			
			if ( $fieldSet->save() ) {
				Session::flash('message', 'Field Set was successfully ' . ( $id > 0 ? 'updated' : 'created' ) . '!');
			}

            return Redirect::route('admin.fieldset.edit', array( 'id' => $fieldSet->id ));
		}	
	}

	/**
	* Delete the field set
	*/
	public function doDelete()
	{
		$id = Input::get('id');

		if ( $id && $fieldSet = FieldSet::find( $id ) ) {			

			if ( $fieldSet->delete() ) {
				Session::flash('message', Lang::get('pages.message.success_deletion', array('object' => 'FieldSet') ) );			
			}

		} else {
			Session::flash('message', Lang::get('pages.message.wrong_deletion') );			
		}

		return Redirect::route('admin.fieldset');
	}

	/**
	 * Render the editField page
	*/
	public function editField( $fid, $id = null )
	{
		$aFieldTypes = array();
		$aField      = array();		

		if ( $id ) {
			$aField = Field::find( $id );
		}

		foreach( FieldType::all() as $oTypeItem) {
			$aFieldTypes[ $oTypeItem->id ] = $oTypeItem->title;
		}

		return View::make('fieldset.edit-field', array(
			'oField' => $aField, 
			'idFieldSet' => $fid,
			'aFieldTypes' => $aFieldTypes
		));
	}

	/**
	 * 
	*/
	public function deleteField( $id )
	{
		$field = null;

		if ( $id ) {
			$field = Field::find( $id );
		}

		if ( empty( $field ) ) {
			return Redirect::route('admin.fieldset');
		}

		return View::make('common.delete', array(
			'sDeleteMessage' => Lang::get('pages.message.delete', array('object' => 'field')),
			'DeleteTitle' => Lang::get('pages.headers.delete_object', array('object' => ' field: #' . $field->id.  ' / <b>' . $field->title . '</b>')),
			'sCancelText' => Lang::get('pages.button.go_back'),
			'sCancelURL' => URL::route( 'admin.field.edit', array('fid' => $field->id_field_set, 'id' => $id )),
			'sDeleteURL' => URL::route( 'admin.field.do.delete'),
			'idObject' => $id,
		));
	}

	/**
	 * Delete field from database OR mark it as deleted
	*/
	public function doDeleteField( ) 
	{
		$id = Input::get('id');

		if ( $id && $field = Field::find( $id ) ) {

			$idFieldSet = $field->id_field_set;

			if ( $field->delete() ) {
				Session::flash('message', Lang::get('success_deletion', array('object' => 'Field') ) );
			}

			return Redirect::route('admin.fieldset.edit', array( 'id' => $idFieldSet ));			
		} else {
			Session::flash('message', Lang::get('pages.message.wrong_deletion') );

			return Redirect::route('admin.fieldset');
		}
	}

	/**
	 * Handle the saving process for the field
	*/
	public function doSaveField()
	{
		Input::flash();
		$validator = Validator::make( Input::all(), Field::$aRules);

		if ( $validator->fails() ) {

            return Redirect::route('admin.field.edit', array(
            	'fid' => Input::get('field_id_fieldset'), 
            	'id' => Input::get('field_id')
            ))->withErrors( $validator );

        } else
		if( $validator->passes() ) {	
			
			$id = Input::get('field_id');

			if ( $id > 0 ) {
				$field = Field::find( $id );
			} else {
				$field = new Field();				
			}

			$field->id_field_set  = Input::get('field_id_fieldset');
			$field->id_field_type = Input::get('field_type');
			$field->title = Input::get('field_name');
			$field->hint  = Input::get('field_hint');
			$field->pos   = Input::get('field_pos');
			$field->is_searchable   = Input::get('field_is_searchable') ? '1' : '0';
			$field->is_filterable   = Input::get('field_is_filterable') ? '1' : '0';
			$field->is_used_in_list = Input::get('field_is_used_in_list') ? '1' : '0';

			if ( $field->save() ) {
				Session::flash('message', 'Field was successfully ' . ( $id > 0 ? 'updated' : 'created' ) . '!');
			}

            return Redirect::route('admin.fieldset.edit', array('id' => $field->id_field_set ));
		}		
	}
}
