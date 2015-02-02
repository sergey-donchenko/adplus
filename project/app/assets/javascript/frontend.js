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



jQuery(function(){
	
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
});
