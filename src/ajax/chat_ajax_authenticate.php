<?php
/**
 */

/**
 * Authenticate a user using the username and OTP sent via a POST request.
 *
 * @uses ioch_authenticate_user to authenticate the user.
 */
function ioch_ajax_authenticate() {

    // Check that the required parameters are provided.
    if ( !isset( $_POST['username'] ) || empty( $_POST['username'] ) ) {
        wp_die('The username parameter is required.');
    }

    if ( !isset( $_POST['otp'] ) || empty( $_POST['otp'] ) ) {
        wp_die('The otp parameter is required.');
    }

    // Get the username and the OTP.
    $username = $_POST['username'];
    $otp      = $_POST['otp'];

    ioch_authenticate_user( $username, $otp );

}
add_action( 'wp_ajax_ioch_authenticate', 'ioch_ajax_authenticate' );
add_action( 'wp_ajax_nopriv_ioch_authenticate', 'ioch_ajax_authenticate' );


function ioch_ajax_authenticate_get() {

    ioch_authenticate_user( $_GET['username'], $_GET['otp'] );

}
add_action( 'wp_ajax_ioch_authenticate_get', 'ioch_ajax_authenticate_get' );
add_action( 'wp_ajax_nopriv_ioch_authenticate_get', 'ioch_ajax_authenticate_get' );


/**
 * Authenticate a user using an OTP and print out the user data as JSON, or return 401 if the user is not authenticated.
 *
 * @param string $username The username.
 * @param string $otp      The OTP.
 */
function ioch_authenticate_user( $username, $otp ) {

    ioch_write_log(
        'Authenticating [ username :: {username} ][ otp :: {otp} ]',
        array( 'username' => $username, 'otp' => $otp )
    );

    // Buffer the response.
    ob_start();

    // Check that the user exists.
    if ( false === ( $user = get_user_by( 'login', $username ) ) ) {

        ioch_write_log( 'Unknown user [ username :: {username} ]', array( 'username' => $username ) );

        // Force the 401 response code.
        http_response_code( 401 );
        exit;

    };

    // Check that the OTP is valid.
    if ( 'otpotp' !== $otp ) {

        ioch_write_log(
            'Invalid OTP [ username :: {username} ][ otp :: {otp} ]',
            array( 'username' => $username, 'otp' => $otp )
        );

        // Force the 401 response code.
        http_response_code( 401 );
        exit;

    }

    // Print out the response.
    header( 'Content-Type: application/json; charset: UTF-8' );

    echo json_encode( array(
        'id'          => $user->ID,
        'login'       => $user->user_login,
        'niceName'    => $user->user_nicename,
        'email'       => $user->user_email,
        'url'         => $user->user_url,
        'registered'  => $user->user_registered,
        'status'      => $user->user_status,
        'displayName' => $user->display_name,
        'roles'       => $user->roles
    ) );

    wp_die();

}