
var check_fotf = function( $ ) {
    if ( $('#gform_44').find('#input_44_4_4').val() == 'SC' && $('#gform_44').find('#input_44_9').val() == 'BECU' ) {
        $( '#gform_44 .ginput_container.error' ).show();
        $( '#gform_44 #gform_submit_button_44' ).prop( "disabled", true );
    } else {
        $( '#gform_44 .ginput_container.error' ).hide();
        $( '#gform_44 #gform_submit_button_44' ).prop( "disabled", false );
    }
}


jQuery(document).ready(function($){

    // if we're on fotf step 2.
    if ( $('#gform_44').length > 0 ) {

        // add an error div
        $('#gform_44').find('.gform_fields').append("<li class='gfield'><label class='gfield_label'></label><div class='ginput_container error'>You may not join the foundation with BECU from South Carolina.</div></li>");

        // when the state field changes
        $('#gform_44').find('#input_44_4_4').on( 'change', function(){
            check_fotf( $ );
        });

        // when the state field changes
        $('#gform_44').find('#input_44_9').on( 'change', function(){
            check_fotf( $ );
        });

    }

    // if we're on fotf step 2 on the becu form.
    if ( $('#gform_51').length > 0 ) {

        // when the state field changes
        $("#gform_51_4_4 select option[value='SC']").remove();

    }

});

