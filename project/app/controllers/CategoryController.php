<?php

class CategoryController extends \BaseController {	

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index( $id = null )
	{
		$aCategory = array();

		if ( $id ) {
			$aCategory = Category::find( $id );		
		}
			
		return View::make('category.admin.index', array( 'aCategory' => $aCategory ));
	}

	/**
	 * Return rendered Category 
	 * 
	 * @param $id <int> - a Category identifier
	 *
	*/
	public function getForm( $id = null )
	{
		$oCategory = null;
		
		if ( $id ) {
			$oCategory = Category::find( $id );
		}
		
		$sResult   = View::make('category.admin.form', array('oCategory' => $oCategory));

		if ( Request::ajax() ) {
			$aResponce = $this->_aResponse;

			$aResponce['data'] = $oCategory;			
			$aResponce['html'] = (String) $sResult;			

			return Response::json($aResponce);
		} else {
			return $sResult;
		}		
	}

	/**
	 * Return a list of categories by the parent identifier
	*/
	public function getCategories()
	{
		if(Request::ajax())
    	{
			$data     = Input::all();
			$response = $this->_aResponse;

			if ( Session::token() !== Input::get( '_token' ) ) {
	            return Response::json( array(
	                'msg' => 'Unauthorized attempt to create setting'
	            ) );
	        }

	        $response['data'] = array();
	        $iParentId        = isset($data['parent']) ? $data['parent'] : 0;
	        $oCategory        = new Category();
	        	
	        // Get a list of categories		
	        $aCategories = $oCategory->getCategoriesByParentId( $iParentId );	

	        if ( $aCategories ) {
	        	foreach( $aCategories as $oItem ) {
	        		$response['data'][] = array(
	        			"isActive" => false,
			        	"isFolder" => ($oItem->children_count > 0),
			        	"isExpanded" => false,
			        	"isLazy" => ($oItem->children_count > 0),
			        	"iconUrl"=>null,
			        	"id"=>$oItem->id,
			        	"href"=>null,
			        	"hrefTarget"=>null,
			        	"lazyUrl"=>null,
			        	"lazyUrlJson"=>null,
			        	"liClass"=>null,
			        	'text' => $oItem->name,
			        	"textCss"=>null,
			        	"tooltip"=>null,
			        	"uiIcon"=>null,
			        	"children"=>null
	        		);		
	        	}
	        }

	        $response['status'] = true;	
	        

	        //,{"isActive":false,"isFolder":false,"isExpanded":false,"isLazy":false,"iconUrl":null,"id":null,"href":null,"hrefTarget":null,"lazyUrl":null,"lazyUrlJson":null,"liClass":null,"text":"Node1","textCss":null,"tooltip":null,"uiIcon":null,"children":null}
			
			return Response::json($response); 	
		}	


        
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function save()
	{
		//
		$validator = Validator::make(Input::all(), Category::$aRules);

		if ($validator->fails()) {
            return Redirect::route('admin.category')
                ->withErrors( $validator );
        } else
		if( $validator->passes() ) {			
			$iId       = Input::get('category_id');
			$iParentId = Input::get('parent_id');
			$sPath     = '';

			if ( $iId ) {
				$cat = Category::find( $iId );		
			} else {
				$cat = new Category();
			}

			$cat->name               = Input::get('category_name');
			$cat->short_description  = Input::get('category_descr');
			$cat->page_title         = Input::get('category_page_title');
			$cat->meta_keywords      = Input::get('category_meta_keywords');
			$cat->meta_description   = Input::get('category_meta_descr');
			$cat->parent_id          = $iParentId;
			$cat->is_active          = Input::get('category_is_active');
				
			if ( $iParentId && $catParent = Category::find( $iParentId ) ) {
				$sPath = $catParent->path . '/' . $iParentId;	
			}
						
			// Do it only one time - during the inserting...			
			if ( empty($iId) ) {				
				$cat->path = $sPath;	
			}

			// Saving
			$iCatId = $cat->save();					

			// Update child count for the parent Category
			if ( $iParentId ) {				
				$iCnt = count($catParent->getCategoriesByParentId( $iParentId ));

				$catParent->children_count = $iCnt;
				$catParent->save();
			} 

			// die( 'Category Identifier: ' . $iCatId );
			// redirect
            Session::flash('message', 'Category was successfully updated!');

            return Redirect::route('admin.category', array('id' => $cat->id));
		}			

		die('Just for test!!!');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Delete the Category item
	*/
	public function delete()
	{
		$data     = Input::all();
		$response = $this->_aResponse;

		if ( Session::token() !== Input::get( '_token' ) ) {
	        return Response::json( array(
	            'msg' => 'Unauthorized attempt to create setting'
	        ) );
	    }

	    if ( Input::get('id') ) {
	    	$oCategory = Category::find( Input::get('id') );

	    	// @TODO: Mark nested categories as deleted
	    	$oCategory->delete();

	    	$response['status'] = true;
	    }
	    
	    return Response::json($response);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
