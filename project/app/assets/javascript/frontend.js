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
    jQuery(document).on('focus', 'textarea.expand', function(){
        jQuery(this).animate({ height: "400px" }, 500);
    });
    
    jQuery(document).on('blur', 'textarea.expand', function() {    
        var newHeight = jQuery(this).height(),
            oldHeight = '114px';

            console.log( jQuery(this).attr('e-height') );

        if ( jQuery(this).attr('e-height') ) {
            oldHeight = jQuery(this).attr('e-height');
        } else {
            oldHeight = ( newHeight / 2 ) + 'px';
        }

        jQuery(this).animate({ height: oldHeight }, 500);
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
