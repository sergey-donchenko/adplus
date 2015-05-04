<?php

class BaseController extends Controller {

	/**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';

    /**
     * The template config
    */    
    protected $templateConfig = null;


    /**
     * List of the titles
    */
    protected $aTitle = array();

    /**
     * $_aResponse  
    */
    protected $_aResponse = array(
        'status' => false,
        'data' => array(),
        'html' => '',
        'msg' => '',
    );
    
    /**
     * Init the config Tempalte  
    */
    public function __construct()
    {
    	$this->templateConfig = Config::get('template');

    	// Set title for the page
    	$this->aTitle[] = $this->templateConfig['headTitle'];
    }

    /**
     * Return the template config
    */
    public function getTemplateConfig()
    {
    	return $this->templateConfig;
    }

    /**
     *
    */
    public function appendTitle( $sTitle )
    {
    	array_unshift( $this->aTitle, $sTitle );

    	return $this;
    }

    /**
     *
    */
    public function prependTitle( $sTitle )
    {
    	array_push( $this->aTitle, $sTitle); 

    	return $this;
    }

    /**
     *
    */
    public function getTitles()
    {
    	return $this->aTitle;
    }

   
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout)) {
			$this->layout = View::make($this->layout, array('headTitle' => $this->getTitles()));
		}
			
	}

}
