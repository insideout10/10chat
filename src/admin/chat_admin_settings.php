<?php
/**
 */


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
        '10chat',
        'ioch_admin_options_page'
    );

}
add_action( 'admin_menu', 'ioch_admin_menu' );

/**
 * Display the 10chat options page.
 */
function ioch_admin_options_page() {
    ?>
    <div class="wrap">
        <h2><?php esc_html_e( '10chat Options', IOCH_LANGUAGE_DOMAIN ) ?></h2>
        <form action="options.php" method="POST">
            <?php settings_fields( '10chat' ); ?>
            <?php do_settings_sections( '10chat' ); ?>
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
    register_setting( '10chat', IOCH_SETTINGS );

    // Add the general section.
    add_settings_section(
        'ioch_settings_section',
        'General settings',
        'ioch_admin_settings_section_callback',
        '10chat'
    );

    // Add the general section.
    add_settings_section(
        'ioch_settings_chat_section',
        'Chat',
        'ioch_admin_settings_chat_section_callback',
        '10chat'
    );

    // Add the field for Application Key.
    add_settings_field(
        IOCH_SETTINGS_SERVER_URL,
        __( 'Server URL', IOCH_LANGUAGE_DOMAIN ),
        'ioch_admin_settings_input_text',
        '10chat',
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
        '10chat',
        'ioch_settings_section',
        array(
            'name'    => IOCH_SETTINGS_APPLICATION_KEY,
            'default' => ''
        )
    );

    // Add the field for default OTP TTL.
    add_settings_field(
        IOCH_SETTINGS_OTP_TTL_SECS,
        __( 'One-Time Passwords Default TTL (in secs)', IOCH_LANGUAGE_DOMAIN ),
        'ioch_admin_settings_input_text',
        '10chat',
        'ioch_settings_section',
        array(
            'name'    => IOCH_SETTINGS_OTP_TTL_SECS,
            'default' => 60
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
 *
 */
function ioch_admin_settings_chat_section_callback() {

    // Enqueue the scripts.
    wp_enqueue_script( 'sockjs', plugin_dir_url( __FILE__ ) . 'js/sockjs-0.3.4.js' );
    wp_enqueue_script( 'stomp', plugin_dir_url( __FILE__ ) . 'js/stomp.min.js' );
    wp_enqueue_script( '10chat-js', plugin_dir_url( __FILE__ ) . 'js/10chat.js', array( 'jquery-ui-draggable' ) );
    wp_enqueue_style( '10chat-css', plugin_dir_url( __FILE__ ) . 'css/10chat.css' );


    $user    = wp_get_current_user();
    $app_key = ioch_get_option( IOCH_SETTINGS_APPLICATION_KEY );
    wp_localize_script( '10chat', 'ioch_options', array(
        'server_url' => ioch_get_option( IOCH_SETTINGS_SERVER_URL ),
        'user'       => array(
            'username'    => $user->user_login,
            'displayName' => $user->display_name,
            'roles'       => $user->roles
        )
    ) );

?>

    <noscript><h2 style="color: #ff0000">Seems your browser doesn't support Javascript! Websocket relies on Javascript being
            enabled. Please enable
            Javascript and reload this page!</h2></noscript>
    <div>
        <div>
            <button type="button" id="connect" onclick="iochat.connect();">Connect</button>
            <button type="button" id="disconnect" disabled="disabled" onclick="iochat.disconnect();">Disconnect</button>
        </div>
        <div id="conversationDiv">
            <label>Content?</label><input type="text" id="content"/>
            <button type="button" id="sendContent" onclick="iochat.sendContent();">Send</button>
            <p id="response"></p>
        </div>
    </div>

<?php

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