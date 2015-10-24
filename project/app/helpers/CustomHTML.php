<?php 

class CustomHTML {
	/**
	 * Generate a link to a JavaScript file.
	 *
	 * @param  string  $url
	 * @param  array   $attributes
	 * @param  bool    $secure
	 * @return string
	 */
	public static function scriptRequireJs($url, $attributes = array(), $secure = null)
	{
		
		if ( isset($attributes['data-main']) === false ) {
			$attributes['data-main'] = Config::get('app.debug') === true ? '/js/dev-main' : '/js/app.main';
		}

		if ( isset($attributes['async']) === false ) {
			$attributes['async'] = true;
		}
		

		return Html::script( $url, $attributes, $secure );
	}

	/**
	 * Generate hidden element with wrapper for dinamic component
	 *
	 * @param string $componentName
	 *
	 * @return string
	*/
	public static function addDynamicComponent( $componentName = '' ) 
	{
		return Form::hidden('dynamic_component', $componentName, array('class' => 'dynamic-component') );
	}
}