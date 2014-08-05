<?php
/**
 */

/**
 * Run the *ozchat* shortcode.
 *
 * @param array $atts The list of configuration parameters.
 * @return string The shortcode output.
 */
function ioch_shortcode_ozchat( $atts ) {
    global $ioch_shortcode_rooms;

    // Get the configuration parameters.
    $params = shortcode_atts( array(
        'room' => 'default-room'
    ), $atts);

    // Add scripts.
    $token  = ioch_api_token();  // Get an authentication token.
    // Enqueue required scripts and options.
    $suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
    wp_enqueue_style( 'ozchat-jquery-ui-css', plugin_dir_url( __FILE__ ) . 'css/ozchat.jquery-ui.css' );
    wp_enqueue_style( 'ozchat-css', plugin_dir_url( __FILE__ ) . 'css/10chat.css' );
    wp_enqueue_script( 'sockjs-js', plugin_dir_url( __FILE__ ) . "js/sockjs-0.3.4$suffix.js" );
    wp_enqueue_script( 'stomp-js', plugin_dir_url( __FILE__ ) . "js/stomp$suffix.js" );
    wp_enqueue_script( 'angular-js', plugin_dir_url( __FILE__ ) . 'js/angular.min.js' );
    wp_enqueue_script( 'ozchat-js', plugin_dir_url( __FILE__ ) . 'js/ozchat.js', array( 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-draggable', 'jquery-ui-resizable' ) );

    wp_localize_script( 'ozchat-js', 'ozchat_options', array(
        'chat' => array(
            'server_url' => ioch_get_option( IOCH_SETTINGS_SERVER_URL )
        ),
        'token' => $token->token,
        'app'   => $token->appName,
        'debug' => ( defined( 'WP_DEBUG' ) && 'true' === WP_DEBUG ? true : false )
    ) );

    // Add the room to th elist of rooms.
    if ( ! isset( $ioch_shortcode_rooms ) ) {
        $ioch_shortcode_rooms = array( $params['room'] );
    } else {
        array_push( $ioch_shortcode_rooms, $params['room'] );
    }

}
add_shortcode( 'ozchat', 'ioch_shortcode_ozchat' );

function ioch_shortcode_ozchat_footer() {

    global $ioch_shortcode_rooms;

    if ( isset( $ioch_shortcode_rooms ) ) {
        echo '<script type="text/javascript">jQuery( function ( $ ) {';

        foreach ( $ioch_shortcode_rooms as $room ) {
            $room_j = json_encode( $room );
            echo "$( '<div></div>' ).appendTo( 'body' ).ozchat( { room: $room_j } );";
        }

        echo '} );</script>';
    }

}
add_action( 'wp_footer', 'ioch_shortcode_ozchat_footer', 999 );