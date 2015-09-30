<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Category extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * 
	*/
	const STORAGE_PREFIX = 'category';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';

	/**
	 * Re-defined default primary key value
	 *
	 * @var string
	*/
	protected $primaryKey = 'id';

	/**
	 * Custom fields
	 *
	 * @var array
	*/
	protected $appends = array('children', 'parents', 'css_class', 'custom_fields', 'parent_fieldset');

	/**
	 * Validation rules
	 *
	 * @var array
	*/
	public static $aRules = array(
		'category_name' => 'required|min:3'
	);	

	/**
	* Return a list of custom fields assigned for current Category
	*
	*
	*/
	public function getCustomFieldsAttribute() 
	{
		return Field::select('fields.*')
			->join('category_fields', 'fields.id', '=', 'id_field')
			->where('category_fields.id_category', '=', $this->id)
			->get();
	}

	/**
	* Return a list of parents field sets
	*
	*/
	public function getParentFieldsetAttribute()
	{		
		$aParentIds = $this->getParentsAttribute();

		if ( $aParentIds ) {
			$aIds = array();

			foreach( $aParentIds as $item ) {
				$aIds[] = $item['id'];
			}

			return self::select('categories.id_fieldset','fields_set.name as fieldsetname')
				->join('fields_set', 'fields_set.id', '=', 'categories.id_fieldset')
				->whereIn('categories.id', $aIds )
				->get();
		}			

		return array();
	}


	/**
	 * Return a list of Categories by the parent identifier
	 *
	 * @param (int) $iParentId - parent identifier 
	 * @param (array) $aParams - set of filters to manage the outputting
	 * @param (bool) $bWithChildOnly - get categories which have at least one child element
	 *
	 * @return (data set) 
	*/
	public function getCategoriesByParentId( $iParentId = 0, $aParams = array(), $bWithChildOnly = false )
	{
		$aWhere = array('parent_id' => $iParentId);
		
		if ( $aParams ) {
			foreach( $aParams as $sKey => $sVal ) {
				$aWhere[ $sKey ] = $sVal;				
			}
		}

		

		// if ( $bWithChildOnly ) {
		// 	// $aWhere['children_count'] = 
		// 	$result->where('children_count', '>', 0);
		// }
		$result = self::where( $aWhere )
			->orderBy( 'position', 'asc') 
			->orderBy( 'name', 'asc') 				
			->get();

		// $result->orderBy('name', 'asc')
		// 	->get();

		return $result;	
	}

	/**
	 * Implementation for the append item 'children'
	 *
	*/
	public function getChildrenAttribute() 
	{
		return $this->getCategoriesByParentId( $this->id, array('is_active' => 1) );
	}

	/**
	 * Expands a list of parent dependencies 
	*/
	public function getParentsAttribute() 
	{
		$arr = array();

		if ( $this->path ) {
			$arrTmp = explode('/', $this->path);
			
			foreach( $arrTmp  as $iParentId ) {
				if ($iParentId) {
					$oCat = self::find( $iParentId );

					if ( $oCat ) { 
						$arr[ $iParentId ] = array(
							'id' => $oCat->id,
							'name' => $oCat->name
						);
					}	
				}				
			}
		}

		return $arr;
	}

	/**
	 * Implementation for the append item 'children'
	 *
	*/
	public function getCssClassAttribute() 
	{
		return ($this->children_count > 0 ? 'hasChildren' : 'selectable');
	}

	/**
	 * Delete a Category
	*/
	public function delete() 
	{
		$children = self::where('path', 'LIKE', '%/' . $this->id . '%')->get();
		
		if ( $children ) {
			foreach( $children as $item ) {
				if ( $item->path && preg_match('/\/' . $this->id . '(\/?)/i', $item->path) ) {
					$item->delete();
				}				
			}
		}		

		return parent::delete();
	}
}
