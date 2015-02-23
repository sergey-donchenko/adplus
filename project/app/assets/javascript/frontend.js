var myDropzone;

Dropzone.options.myDropzone = {
    init: function() {
      this.on("addedfile", function(file) {

        // Create the remove button
        var removeButton = Dropzone.createElement("<button class='btn btn-dropzone'>Remove file</button>");
        

        // Capture the Dropzone instance as closure.
        var _this = this;

        // Listen to the click event
        removeButton.addEventListener("click", function(e) {
          // Make sure the button click doesn't submit the form:
          e.preventDefault();
          e.stopPropagation();

          // Remove the file preview.
          _this.removeFile(file);
          // If you want to the delete the file on the server as well,
          // you can do the AJAX request here.
        });

        // Add the button to the file preview element.
        file.previewElement.appendChild(removeButton);
      });
    }
};

/**
 * Define the adPlusExchange object to work with dynamic and static data
 * 
 * @project AdPlus
 * 
*/
var adPlusExchange = (function() {
    var instance = null;

    /**
     * Create singleton object 
    */
    function createObject() {
        var config = {
            comp_form_login : 'user-login-form'                
        };

        return {
            /**
             * Init the CmonExchange with the set of variables
            */
            init : function( object ) {
                config = jQuery.extend(config, object);

                // debug information
                console.log( config );
            }, 

            /**
             * Return config item with key "item"
             * 
             * @param <string> item - string identifier foe the setting property
             * @param <mixed>  defValue - default value for the setting item if it was not found
             *
             * @return < null | mixed >
            */
            get : function( item, defValue ) {
                if ( config.hasOwnProperty( item ) ) {
                    return config[item];
                } else 
                if ( defValue ) {
                    return defValue;
                }

                return null;
            },

            /**
             * Set the value for the config item OR create if it was not created previously
             *
             * @param <string> item - string identifier foe the setting property
             * @param <mixed>  value - value for the setting
             *
             * @return < instance object >
            */
            set : function( item, value ) {
                config[ item ] = value;                

                return instance; 
            },

            /**
             * Form validation
             *
             * @return (true | false) is the form valid?
            */
            validate : function( form ) {
                var validationResults = regula.validate(),
                    index = 0,
                    element = null,
                    errors = [];

                for(index in validationResults) {
                    element = validationResults[index];

                    if ( element ) {
                        if ( element.failingElements.length > 0 ) {
                            this.fieldError( element.failingElements[0], element.message );                                
                        } 
                        errors.push( element );    
                    }                                         
                }

                if ( errors.length > 0 ) {
                    return false;
                }

                return true;
            },

            /**
             * Submit form to the Backend 
             *
             * @return @return Promise object
            */
            submit : function( form ) {
                var data = jQuery(form).serialize(),
                    url = jQuery(form).attr( "action" ),
                    posting = jQuery.post( url, { formData: data } );

                return posting;     
            },

            /**
             * Handle the error for the particular field
             *
             * @param <object> field - handled element
             * @param <string> message  - the text of the error
             * 
             * @return <object> - return the current object
            */
            fieldError : function( field, message ) {
                
                if ( field ) {
                    jQuery( field )
                        .unbind('keypress')
                        .bind('keypress', function(){
                            jQuery(this).parents('.form-group')
                                .removeClass('error')
                                .find('.error-inline')
                                .html('');    
                    }).parents('.form-group')
                        .addClass('error')
                        .find('.error-inline')
                        .html( message );
                }
                        
                return this;    
            },

            /**
             * Show notifications in Dialog
             *
             * @param <string> title - dialog title
             * @param <string> message - the dialog body
             * @param <string> type - the dialog type
             *   - success
             *   - error
             *   - info
             *   - warning
            */
            showMessage : function( title, message, type, hideTheRespPopup ) {
                var sModalId = 'modalNotification',
                    sClass = '',
                    sIcon = ''; 
                
                // Hide all previously opened dialogs
                if ( hideTheRespPopup === true) {
                    jQuery('.modal').modal('hide');    
                }
                
                
                if ( title ) {
                    jQuery('#' + sModalId).find('.modal-title')
                        .html(title);    
                }
                
                switch ( type ) {
                    case 'success':
                        sClass = 'alert-success'; 
                        sIcon = 'glyphicon-ok-sign';
                        break;    
                    case 'info':
                        sClass = 'alert-info';  
                        sIcon = 'glyphicon-info-sign';  
                        break;
                    case 'error':
                        sClass = 'alert-danger'; 
                        sIcon = 'glyphicon-exclamation-sign';
                        break;    
                    default:
                        sClass = 'alert-warning';
                        sIcon = 'glyphicon-warning-sign';
                                            
                }

                message = '<div class="alert ' + sClass + '" role="alert">'
                    //+ '<span class="glyphicon ' + sIcon + '" aria-hidden="true"></span>'
                    + message 
                    + '</div>'; 
                

                if ( message ) {
                    jQuery('#' + sModalId).find('.modal-body')
                        .html( message );
                }                

                jQuery('#' + sModalId).modal();

                return this;
            },

            /**
             * Redirect to the URL
            */
            toUrl : function( url, timeout ) {
                if ( url ) {

                    if ( !timeout ) { 
                        timeout = 0;
                    } 

                    setTimeout(function() {
                        window.location.href = url;
                    }, timeout);
                    
                }

                return this;
            }
        }
    }
        
    return {
        /**
         * Create object instance OR check if it was created previously 
         * and return singleton instance
         *
         * @return <object>
        */
        getInstance: function() {

            if ( !instance ) {
                instance = new createObject();
            }
        
            return instance;
        }    
    }  
})( window );    

/**
* jQuery handler for on load event
*/
jQuery(function() {
	
    var frmLoginId = adPlusExchange.getInstance().get('comp_form_login');

    // Init the validation tool
    regula.bind(); 

	jQuery('[data-toggle="tooltip"]').tooltip();

	//for the dropdown regions box
    jQuery( "#regionsBtn" ).bind( "click", function() {
        jQuery('#myTab a:eq(0)').tab('show');
        jQuery('#regionsModal').modal({
            keyboard: false
        });

        return false;
    });
    
    jQuery(document).click(function(event) { 

        if(jQuery(event.target).parents().index(jQuery('#regionsModal')) == -1) {
            if(jQuery('#regionsModal').is(":visible")) {
                jQuery('#regionsModal').modal('hide');
            }
        }        
    });

    // Handle login form
    if (frmLoginId) {        
        jQuery('#' + frmLoginId).on('submit', function( event ) {
            var form = this;

            event.preventDefault();

            // Validate the form
            if ( adPlusExchange.getInstance().validate( form ) === false ) {                
                return false;
            }
            
            // Submit the form
            adPlusExchange.getInstance().submit( form ).done( function( data ) {

                if ( data.fail ) {
                    for(var index in data.errors ) {
                        adPlusExchange.getInstance()
                            .fieldError( jQuery( form ).find( '#' + index), data.errors[index][0] );
                    }
                } else {
                    adPlusExchange.getInstance()
                        .showMessage('Redirecting the home page...', data.message, 'success', true )
                        .toUrl('/', 2000);
                }               

                console.log( data );
            });
            
        });   
    }
    
    //listings show more
    jQuery( "#more_make" ).bind( "click", function() {
        jQuery('#more_make_list').show();
        jQuery('#more_make_link').hide();
        
        return false;
    });    
    
    jQuery( "#less_make" ).bind( "click", function() {
        jQuery('#more_make_list').hide();
        jQuery('#more_make_link').show();

        return false;
    });

    //the login modals
    jQuery('#modalLogin').on('show.bs.modal', function () {
        jQuery('#modalSignup').modal('hide');
    });
    
    jQuery('#modalForgot').on('show.bs.modal', function () {
        jQuery('#modalLogin').modal('hide');
    });

    //make text area bigger
    var textarea_height = jQuery('textarea.expand').height();
    jQuery('textarea.expand').focus(function () {
        jQuery(this).animate({ height: "400px" }, 500);
    });    
    
    jQuery('textarea.expand').focusout(function () {
        jQuery(this).animate({ height: textarea_height }, 500);
    });


    if( jQuery("#visualization").length > 0 ){
        var css_id = "#visualization";
        var data = [
            {label: 'BMW 525D SE TOURING SILVER', data: [[1,700], [2,600], [3,400], [4,390], [5,300], [6,300], [7,300]]},
            {label: 'SEAT Leon 1.6 TDI CR S 5dr (2010)', data: [[1,800], [2,600], [3,400], [4,400], [5,500], [6,400], [7,400]]},
            {label: '2008 Scuderia Spider 16M', data: [[1,800], [2,200], [3,200], [4,200], [5,100], [6,50], [7,0]]}
        ];

        var options = {
            series: {stack: 0,
                     lines: {show: true, steps: false },
                     bars: {show: false, barWidth: 0.9, align: 'center'}
            },
            xaxis: {ticks: [[1,'Sun'], [2,'Mon'], [3,'Tue'], [4,'Wed'], [5,'Thu'], [6,'Fri'], [7,'Sat']]}
        };

        jQuery.plot( jQuery(css_id), data, options);
    }
});
