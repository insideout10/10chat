<?php
/*  Copyright 2014  InsideOut10  (email : info@insideout.io) */

// Add logging functions.
require_once( 'chat_log.php' );

/**
 * Plugin Name: 10chat
 * Plugin URI: http://insideout.io
 * Description: Engage your community with WordPress Chat!
 * Version: 1.0.0-SNAPSHOT
 * Author: InsideOut10
 * Author URI: http://insideout.io
 * License: copyright 2014, InsideOut10
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

    ioch_write_log(
        'Authenticating [ username :: {username} ][ otp :: {otp} ]',
        array( 'username' => $username, 'otp' => $otp )
    );

    // TODO: authenticate the user.

    wp_die();

}
add_action( 'wp_ajax_nopriv_ioch_authenticate', 'ioch_ajax_authenticate' );