<?php
/**
 * Plugin Name: 10chat
 * Plugin URI: http://insideout.io
 * Description: Engage your community with WordPress Chat!
 * Version: 1.0.0-SNAPSHOT
 * Author: InsideOut10
 * Author URI: http://insideout.io
 * License: GPL
 */

// Add constants.
require_once( 'chat_constants.php' );

// Add logging functions.
require_once( 'chat_log.php' );

// Add configuration functions.
require_once( 'chat_config.php' );

// Add support for API calls.
require_once( 'chat_api.php' );

// Add ajax authenticate method.
require_once( 'ajax/chat_ajax_authenticate.php' );

// Add the *ozchat* shortcode.
require_once( 'shortcodes/chat_shortcode_ozchat.php' );

// Admin files.
require_once( 'admin/chat_admin_settings.php' );

// Add admin ajax functions.
require_once( 'admin/ajax/chat_admin_ajax_rooms.php' );

// Add admin messages functions.
require_once( 'admin/ajax/chat_admin_ajax_messages.php' );


/**
 * Change *plugins_url* response to return the correct path of 10chat files when working in development mode.
 *
 * @param string $url    The URL as set by the plugins_url method.
 * @param string $path   The request path.
 * @param string $plugin The plugin folder.
 * @return string The URL.
 */
function ioch_plugins_url( $url, $path, $plugin )
{

//    ioch_write_log(
//        "ioch_plugins_url [ url :: {url} ][ path :: {path} ][ plugin :: {plugin} ]",
//        array( 'url' => $url, 'path' => $path, 'plugin' => $plugin )
//    );

    // Check if it's our pages calling the plugins_url.
    if ( 1 !== preg_match( '/\/chat_[^.]*.php$/i', $plugin ) ) {
        return $url;
    };

    // Set the URL to plugins URL + helixware, in order to support the plugin being symbolic linked.
    $plugin_url = plugins_url() . '/10chat/' . $path;

//    ioch_write_log(
//        'ioch_plugins_url [ match :: yes ][ plugin url :: {plugin-url} ][ url :: {url} ][ path :: {path} ][ plugin :: {plugin} ]',
//        array( 'plugin-url', $plugin_url, 'url' => $url, 'path' => $path, 'plugin' => $plugin )
//    );

    return $plugin_url;
}
add_filter( 'plugins_url', 'ioch_plugins_url', 10, 3 );


function ioch_init() {

    // Enqueue the scripts.
    wp_enqueue_script( 'sockjs', plugin_dir_url( __FILE__ ) . 'js/sockjs-0.3.4.js' );
    wp_enqueue_script( 'stomp', plugin_dir_url( __FILE__ ) . 'js/stomp.min.js' );
    wp_enqueue_script( 'ozchat-js', plugin_dir_url( __FILE__ ) . 'js/10chat.js', array( 'jquery-ui-draggable' ) );
    wp_enqueue_style( 'ozchat-css', plugin_dir_url( __FILE__ ) . 'css/10chat.css' );


    $user    = wp_get_current_user();

    wp_localize_script( 'ozchat-js', 'ioch_options', array(
        'server_url' => ioch_get_option( IOCH_SETTINGS_SERVER_URL ),
        'user'       => array(
            'username'    => $user->user_login,
            'displayName' => $user->display_name,
            'roles'       => $user->roles
        )
    ) );

}
//add_action( 'wp_head', 'ioch_init' );