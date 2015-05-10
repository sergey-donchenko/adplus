var modModal = (function ( $, adPlus ) {
	/**
	 * @var module settings
	*/
	var _config = {
		id: 'modalDialog',
		content: '',
		url: null,
		history: {},
		template: '<div id="%%DIALOG_ID%%" class="modal fade">' +
				'<div class="modal-dialog">' +
					'<div class="modal-content">'+
						'<div class="modal-header">'+
							'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
        					'<h3 id="termsLabel" class="modal-title">TERMS AND CONDITIONS</h3>'+
						'</div>'+
						'<div class="modal-body">%%CONTENT%%</div>'+
						'<div class="modal-footer">'+
				        	'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'+
				        '</div>'+
					'</div>'+
 				'</div>'+
			'</div>'
	};

	return {		
		/**
		 * Init the Modal module
		*/	
		init : function( params ) {

			if ( params ) {
            	_config = $.extend( _config, params );
			}

			_config.template  = _config.template
				.replace(new RegExp('\%\%DIALOG_ID\%\%', 'g'), _config.id)
				.replace(new RegExp('\%\%CONTENT\%\%'), _config.content);

			if ( $('#' + _config.id ).length === 0 ) {
				$( _config.template ).appendTo( document.body );

				var modal = $('#' + _config.id ),
					modalBody = $('#' + _config.id + ' .modal-body');

				modal.on('show.bs.modal', function () {
					if ( _config.url !== null ) {
						if ( _config.history[_config.url] ) {
							modalBody.html( _config.history[_config.url] );
						} else {
							modalBody.load( _config.url, function(data, status, e) {
								if ( status === 'success' ) {
									_config.history[_config.url] = data;	
								}
							});
						}						
					} else {
						modalBody.html( _config.content );
					}
				})
			}

			return this;
		},

		/**
		 * Show the dialog
		*/
		show: function() {
			var dialog = $('#' + _config.id );

			dialog.modal();    

			return this;
		}
	}

})( jQuery, adPlusExchange );