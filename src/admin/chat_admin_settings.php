<?php
/**
 */

// Add support for rooms.
require_once( 'chat_admin_settings_rooms.php' );

// Add support for messages.
require_once( 'chat_admin_settings_messages.php' );

/**
 * Create a menu entry in WordPress *Settings* menu.
 *
 * @uses ioch_admin_options_page to display the options page.
 */
function ioch_admin_menu() {

    add_options_page(
        __( '10chat', IOCH_LANGUAGE_DOMAIN ),
        __( '10chat', IOCH_LANGUAGE_DOMAIN ),
        'manage_options',
        IOCH_OPTIONS_PAGE_SLUG,
        'ioch_admin_options_page'
    );

}
add_action( 'admin_menu', 'ioch_admin_menu' );

/**
 * Display the 10chat options page.
 */
function ioch_admin_options_page() {

    // The list of sections.
    $sections = array(
        IOCH_OPTIONS_SETTINGS_ROOMS    => __( 'Rooms', IOCH_LANGUAGE_DOMAIN ),
        IOCH_OPTIONS_SETTINGS_MESSAGES => __( 'Messages', IOCH_LANGUAGE_DOMAIN ),
        IOCH_OPTIONS_SETTINGS_SERVER   => __( 'Server', IOCH_LANGUAGE_DOMAIN )
    );

    // Set th active section.
    $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : key( $sections );


    // Add scripts.
    $token = ioch_api_token();  // Get an authentication token.
    wp_enqueue_script( 'angular-js', plugin_dir_url( __FILE__ ) . 'js/angular.min.js' );
    wp_enqueue_script( 'ozchat-admin-js', plugin_dir_url( __FILE__ ) . 'js/ozchat.admin.js' );
    wp_localize_script( 'ozchat-admin-js', 'ozchat_admin_options', array(
        'chat' => array(
            'server_url' => ioch_get_option( IOCH_SETTINGS_SERVER_URL )
        ),
        'server_url' => admin_url( 'admin-ajax.php' ),
        'end_points' => array(
            'rooms'    => '?action=ioch_rooms',
            'messages' => '?action=ioch_messages'
        ),
        'token' => $token->token,
        'app'   => $token->appName
    ) );

?>

    <div class="wrap">
        <h2><?php esc_html_e( '10chat Options', IOCH_LANGUAGE_DOMAIN ) ?></h2>

        <h2 class="nav-tab-wrapper">
<?php

    // Print the tabs titles.
    foreach ( $sections as $key => $value ) {

        echo '<a href="?page=' . IOCH_OPTIONS_PAGE_SLUG . '&tab=' . $key . '" class="nav-tab ' .
            ( $active_tab === $key ? 'nav-tab-active' : '' ) . '">' . esc_html( $value ) . '</a>';
    }
?>
        </h2>

        <form action="options.php" method="POST">
            <?php settings_fields( $active_tab ); ?>
            <?php do_settings_sections( $active_tab ); ?>
            <?php submit_button(); ?>
        </form>

    </div>
<?php
}

/**
 * Register 10chat settings and related configuration screen.
 */
function ioch_admin_settings() {

    // Register the settings.
    register_setting( IOCH_OPTIONS_SETTINGS_SERVER, IOCH_SETTINGS );

    // Add the general section.
    add_settings_section(
        'ioch_settings_section',
        'General settings',
        'ioch_admin_settings_section_callback',
        IOCH_OPTIONS_SETTINGS_SERVER
    );

    // Add the general section.
    add_settings_section(
        'ioch_settings_rooms_section',
        'Chat',
        'ioch_admin_settings_rooms_section_callback',
        IOCH_OPTIONS_SETTINGS_ROOMS
    );

    // Add the general section.
    add_settings_section(
        'ioch_settings_messages_section',
        'Chat',
        'ioch_admin_settings_messages_section_callback',
        IOCH_OPTIONS_SETTINGS_MESSAGES
    );

    // Add the field for Application Key.
    add_settings_field(
        IOCH_SETTINGS_SERVER_URL,
        __( 'Server URL', IOCH_LANGUAGE_DOMAIN ),
        'ioch_admin_settings_input_text',
        IOCH_OPTIONS_SETTINGS_SERVER,
        'ioch_settings_section',
        array(
            'name'    => IOCH_SETTINGS_SERVER_URL,
            'default' => ''
        )
    );

    // Add the field for Application Key.
    add_settings_field(
        IOCH_SETTINGS_APPLICATION_KEY,
        __( 'Application Key', IOCH_LANGUAGE_DOMAIN ),
        'ioch_admin_settings_input_text',
        IOCH_OPTIONS_SETTINGS_SERVER,
        'ioch_settings_section',
        array(
            'name'    => IOCH_SETTINGS_APPLICATION_KEY,
            'default' => ''
        )
    );

    // Add the field for default OTP TTL.
    add_settings_field(
        IOCH_SETTINGS_APPLICATION_SECRET,
        __( 'Application Secret', IOCH_LANGUAGE_DOMAIN ),
        'ioch_admin_settings_input_text',
        IOCH_OPTIONS_SETTINGS_SERVER,
        'ioch_settings_section',
        array(
            'name'    => IOCH_SETTINGS_APPLICATION_SECRET,
            'default' => ''
        )
    );

}
add_action( 'admin_init', 'ioch_admin_settings' );

/**
 * Print the general section header.
 */
function ioch_admin_settings_section_callback() {

    echo '<p>' .
        esc_html__( 'Set here the basic settings for 10chat.' ) .
        '</p>';

}

/**
 * Print an input box with the specified name. The value is loaded from the stored settings. If not found, the default
 * value is used.
 *
 * @uses ioch_get_option to get the option value.
 *
 * @param array $args An array with a *name* field containing the option name and a *default* field with its default
 *                    value.
 */
function ioch_admin_settings_input_text( $args ) {

    $value_e = esc_attr( ioch_get_option( $args['name'], $args['default'] ) );
    $name_e  = esc_attr( $args['name'] );

    echo "<input name='" . IOCH_SETTINGS . "[$name_e]' type='text' value='$value_e' size='40' />";
}