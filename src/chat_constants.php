<?php
/**
 */

// Define the main settings key and the parameter names.
define( 'IOCH_SETTINGS', 'ioch_settings' );
define( 'IOCH_SETTINGS_SERVER_URL', 'ioch_server_url' );
define( 'IOCH_SETTINGS_APPLICATION_KEY', 'ioch_application_key' );
define( 'IOCH_SETTINGS_APPLICATION_SECRET', 'ioch_application_secret' );

// The language domain.
define( 'IOCH_LANGUAGE_DOMAIN', 'ioch_language_domain' );

// The slug used to create the options page.
define( 'IOCH_OPTIONS_PAGE_SLUG', 'ioch_options' );
// The server settings (section).
define( 'IOCH_OPTIONS_SETTINGS_SERVER', 'ioch_options_settings_server' );
define( 'IOCH_OPTIONS_SETTINGS_ROOMS', 'ioch_options_settings_rooms' );
define( 'IOCH_OPTIONS_SETTINGS_MESSAGES', 'ioch_options_settings_messages' );

// Default (serialized) settings for HTTP calls to the server.
define( 'IOCH_API_HTTP_OPTIONS', serialize( array(
    'timeout' => 300,
    'redirection' => 5,
    'httpversion' => '1.0',
    'blocking' => true,
    'cookies' => array(),
    'sslverify' => ( defined( WP_DEBUG ) ? !WP_DEBUG : true ) // disable sslverify if DEBUG is on.
) ) );