<?php

class RecordHelper {

    private static $_aStatuses = array(
    	0 => array('css' => 'glyphicon-eye-close', 'title' => 'Disabled'),
    	1 => array('css' => 'glyphicon-eye-open', 'title' => 'Enabled'),
    );

    /**
     * Returns the HTML defenition for the status
    */
    public static function getStatus( $iStatus, $hasWrapper = false )
    {
    	$iIndex  = $iStatus >= 1 ? 1 : 0;
    	$sResult = '<span class="glyphicon ' . self::$_aStatuses[$iIndex]['css'] . '" aria-hidden="true" title="' . self::$_aStatuses[$iIndex]['title'] . '"></span>';

    	if ( $hasWrapper ) {
    		$sResult = '<span class="display-status">' . $sResult . '</span>';
    	}

    	return $sResult;
    }    
}