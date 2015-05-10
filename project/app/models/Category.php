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

	protected $primaryKey = 'id';


	public static $aRules = array(
		'category_name' => 'required|min:3'
	);	

	/**
	 * Return a list of Categories by the parent identifier
	 *
	 * @parent (int) $iParentId - parent identifier 
	 *
	 * @return (data set) 
	*/
	public function getCategoriesByParentId( $iParentId = 0 )
	{
		return self::where('parent_id', '=', $iParentId)
			->orderBy('name', 'asc')
			->get();
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
