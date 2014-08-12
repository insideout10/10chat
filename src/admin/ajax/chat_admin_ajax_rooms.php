<?php
/**
 */

/**
 * Provides a relay to the *rooms* end point.
 */
function ioch_admin_ajax_rooms() {

    // TODO: check the user capabilities.

    // Call the remote URL, using the same method used to call the AJAX method.
    $request_body = file_get_contents( 'php://input' );
    $response     = ioch_api_call( '/1/rooms', $_SERVER['REQUEST_METHOD'], $request_body );

    echo $response['body'];

    wp_die();

}
add_action( 'wp_ajax_ioch_rooms', 'ioch_admin_ajax_rooms' );