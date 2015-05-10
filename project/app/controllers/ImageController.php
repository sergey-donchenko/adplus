<?php

class ImageController extends \BaseController {	
	
	/**
	 * Make a new response out of the contents of the file
	 *
	 * @param <string> $type - type of the resources
	 * @param <string> $size - size of the image we need to get
	 * @param <string> $filename - file name
	 *
	 * @return (response)
	*/
	public function getImage($type, $size, $filename) 
	{
		$aSize    = explode(',', $size);
		$sEmptPth = Config::get('storage.image') . '/empty/';
		$sImgPth  = '';

		switch ( $type ) {
			case 'category':
				$sImgPth = Config::get('storage.image') . '/' . Category::STORAGE_PREFIX . '/' . $filename;
				
				if ( !file_exists( $sImgPth ) ) {
					$sImgPth = $sEmptPth . 'category.jpg';	
				}

				break;
			
			default:
				# code...
				break;
		}		

		$oImg = Image::make( $sImgPth );		

		$iWidth  = $oImg->getWidth();
		$iHeight = $oImg->getHeight();

		if ( is_array($aSize) ) {			
			if ( $aSize[0] > 0 && $aSize[0] <= $oImg->getWidth() ) {
				$iWidth = $aSize[0];
			}

			if ( count($aSize) > 1 ) {
				if ( $aSize[1] > 0 && $aSize[1] <= $oImg->getHeight() ) {
					$iHeight = $aSize[1];
				}
			}

		}

		return $oImg->resize( $iWidth, $iHeight )->response();		
	}	
}