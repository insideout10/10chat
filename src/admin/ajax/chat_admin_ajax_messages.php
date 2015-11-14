<?php
/**
 */

/**
 * Provides a relay to the *messages* end point.
 */
function ioch_admin_ajax_messages() {

    // TODO: check the user capabilities.

    // Call the remote URL, using the same method used to call the AJAX method.
    $request_body = file_get_contents( 'php://input' );
    $path         = '/1/messages' . ( isset( $_GET['p'] ) ? '/' . $_GET['p'] : '' );
    $response     = ioch_api_call( $path, $_SERVER['REQUEST_METHOD'], $request_body );

    echo $response['body'];

    wp_die();

}
add_action( 'wp_ajax_ioch_messages', 'ioch_admin_ajax_messages' );