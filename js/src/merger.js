

// onload notice bar functionality.
jQuery(document).ready(function($){

    if ( $( '.lightbox-merger' ).length > 0 ) {
        if ( $.cookies.get( 'lightbox-merger-shown' ) == null ) {
            $.magnificPopup.open({
                items: {
                    src: '.lightbox-merger'
                },
                type: 'inline',
                callbacks: {
                    close: function(){
                        $.cookies.set( 'lightbox-merger-shown', 'true' );
                    }
                }
            });
        }
    }

});

