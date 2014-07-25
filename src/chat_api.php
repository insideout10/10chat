<?php
/**
 */

/**
 * Performs a call to the remote server API.
 *
 * @param string $endpoint     The remote path.
 * @param string $method       The request method (default 'GET')
 * @param string $body         The request body.
 * @param string $content_type The request content type (default 'application/json').
 * @param string $accept       The request accept (default 'application/json').
 * @return array|WP_Error The server response array or a WP_Error instance.
 */
function ioch_api_call( $endpoint, $method = 'GET', $body = '', $content_type = 'application/json', $accept = 'application/json' ) {

    ioch_write_log( '[ endpoint :: {endpoint} ][ method :: {method} ]', array( 'endpoint' => $endpoint, 'method' => $method ) );

    // Get the configuration settings.
    $server_url = ioch_get_option( IOCH_SETTINGS_SERVER_URL, false );
    $app_key    = ioch_get_option( IOCH_SETTINGS_APPLICATION_KEY, false );
    $app_secret = ioch_get_option( IOCH_SETTINGS_APPLICATION_SECRET, false );

    if ( false === $server_url || false === $app_key || false === $app_secret ) {
        wp_die( __( 'The plugin is not configured.', IOCH_LANGUAGE_DOMAIN ) );
    }

    // Set the full URL.
    $url        = $server_url . $endpoint;

    // Prepare the default arguments.
    $args = array_merge_recursive( unserialize( IOCH_API_HTTP_OPTIONS ), array(
        'method'  => $method,
        'headers' => array(
            'Content-Type'         => $content_type,
            'Accept'               => $accept,
            'Authorization'        => 'Basic ' . base64_encode( $app_key . ':' . $app_secret )
        ),
        'body'    => $body
    ) );

    // Perform the request.
    $response = wp_remote_request( $url, $args );

    // If an error occurs, print the error and exit.
    if ( is_wp_error( $response ) || 200 !== $response['response']['code'] ) {

        ioch_write_log(
            'An error occurred while calling the remote server ( ' .
            ( is_wp_error( $response ) ? $response->get_error_message() : $response['body'] ) . ' )'
        );

        return( __(
            'An error occurred while calling the remote server ( ' .
            ( is_wp_error( $response ) ? $response->get_error_message() : $response['body'] ) . ' )',
            IOCH_LANGUAGE_DOMAIN
        ) );

    }

    // Return the response.
    return $response;

}