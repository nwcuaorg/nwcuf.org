<?php



// generate a confirmation code for the person based on the CU name they chose.
function friends_add_confirmation_code( $notification, $form, $entry ) {

    // generate confirmation code from CU abbreviation and entry id.
	$confirmation_code = strtoupper( $entry['9'] ) . str_pad( $entry['id'], 5, "0", STR_PAD_LEFT );
    $_SESSION['confirmation_code'] = $confirmation_code;

    // update database to store confirmation code with entry.
    global $wpdb;
    $wpdb->insert("{$wpdb->prefix}rg_lead_detail", array(
        'value'         => $confirmation_code,
        'field_number'  => 18,
        'lead_id'       => $entry['id'],
        'form_id'       => $entry['form_id']
    ));

    // replace our special code in the notification email with the confirmation code.
    $notification['message'] = str_replace( "{confirmation_code}", $confirmation_code, $notification['message'] );

    // return the notification so it can be sent.
    return $notification;

}



// redirect after submission
function friends_post_redirect( $entry, $form ) {

    // redirect to thanks page.
    wp_redirect( "/friends-of-the-foundation/thanks/?entry=" . $entry['id'], 302 );
}


// add both hooks to relevant forms.
add_filter( 'gform_notification_1', 'friends_add_confirmation_code', 10, 3 );
add_action( 'gform_after_submission_1', 'friends_post_redirect', 10, 2 );


?>