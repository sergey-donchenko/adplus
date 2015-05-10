var modAdvert = (function ( $, adPlus ) {
	/**
	 * @var module settings
	*/
	var _config = {
		category: null, // category component
		initForm: false, // init the advert form
		allowImageLoading: true 
	};

	/**
	 * init advertisement form and destribute the events handlers
	 *
	*/
	function initAdvertForm() {

		// Handle the "Choose category" button
		$('#selectCategory').click(function(e){
			if ( _config.category ) {
				_config.category.selectDialog( {} );
			}
		});
	}

	return {		
		/**
		 * Init the advertisement module
		*/	
		init : function( params ) {
			if ( params ) {
            	_config = $.extend( _config, params );
			}

			_config.category = adPlus.getInstance().Module.get('modCategory');

			if ( _config.category ) {
				_config.category.init();

				if ( _config.initForm ) {
					initAdvertForm();
				}
			}

			
			return this;
		}
	}

})( jQuery, adPlusExchange );
