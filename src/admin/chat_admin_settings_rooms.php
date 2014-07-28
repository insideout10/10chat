<?php
/**
 */

function ioch_admin_settings_rooms_section_callback() {

    // Enqueue required scripts and options.
    wp_enqueue_style( 'ozchat-jquery-ui-css', plugin_dir_url( __FILE__ ) . 'css/ozchat.jquery-ui.css' );
    wp_enqueue_style( 'ozchat-css', plugin_dir_url( __FILE__ ) . 'css/10chat.css' );
    wp_enqueue_script( 'sockjs-js', plugin_dir_url( __FILE__ ) . 'js/sockjs-0.3.4.min.js' );
    wp_enqueue_script( 'stomp-js', plugin_dir_url( __FILE__ ) . 'js/stomp.min.js' );
    wp_enqueue_script( 'angular-js', plugin_dir_url( __FILE__ ) . 'js/angular.min.js' );
    wp_enqueue_script( 'ozchat-js', plugin_dir_url( __FILE__ ) . 'js/ozchat.js', array( 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-draggable', 'jquery-ui-resizable' ) );

    $token = ioch_api_token();  // Get an authentication token.
    wp_localize_script( 'ozchat-js', 'ozchat_options', array(
        'chat' => array(
            'server_url' => ioch_get_option( IOCH_SETTINGS_SERVER_URL )
        ),
        'token' => $token->token,
        'app'   => $token->appName
    ) );

    // Set the labels.
    $label_name_h      = esc_html__( 'Name', IOCH_LANGUAGE_DOMAIN );
    $label_open_h      = esc_html__( 'Open', IOCH_LANGUAGE_DOMAIN );
    $label_save_h      = esc_html__( 'Save', IOCH_LANGUAGE_DOMAIN );
    $label_moderated_h = esc_html__( 'Moderated', IOCH_LANGUAGE_DOMAIN );

?>

    <table class="wp-list-table widefat fixed posts" ng-app="ozchat" ng-controller="RoomController">
        <thead>
            <th scope="col" class="manage-column"><?php echo $label_name_h; ?></th>
            <th scope="col" class="manage-column"><?php echo $label_moderated_h; ?></th>
        </thead>

        <tfoot>
            <th scope="col" class="manage-column"><?php echo $label_name_h; ?></th>
            <th scope="col" class="manage-column"><?php echo $label_moderated_h; ?></th>
        </tfoot>

        <tbody id="the-list">
            <tr class="alternate">
                <td><input name="name" ng-model="newRoom.name" type="text" placeholder="name"></td>
                <td>
                    <input name="moderated" ng-model="newRoom.moderated" type="checkbox">
                    <button type="button" ng-click="create(newRoom);" class="button-primary save alignright"><?php echo $label_save_h; ?></button>
                </td>
            </tr>
            <tr ng-class="$odd ? 'alternate' : ''" ng-repeat="room in rooms">
                <td><span ng-bind="room.name">my-room</span> <span ng-click="open(room);" title="<?php echo $label_open_h; ?>" class="ozchat-open-chat dashicons dashicons-admin-comments"></span>
                </td>
                <td ng-bind="room.moderated">no</td>
            </tr>
        </tbody>
    </table>

<?php

}

