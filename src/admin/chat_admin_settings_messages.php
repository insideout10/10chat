<?php
/**
 */

function ioch_admin_settings_messages_section_callback() {
    
    // Load js
    $suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
    wp_enqueue_script( 'sockjs-js', plugin_dir_url( __FILE__ ) . "js/sockjs-0.3.4$suffix.js" );
    wp_enqueue_script( 'stomp-js', plugin_dir_url( __FILE__ ) . "js/stomp$suffix.js" );
    wp_enqueue_script( 'ozchat-js', plugin_dir_url( __FILE__ ) . 'js/ozchat.js', array( 'jquery-ui-core', 'jquery-ui-widget' ) );
    wp_enqueue_script( 'ozchat-admin-js-messages', plugin_dir_url( __FILE__ ) . 'js/ozchat.admin.messages.js' );
    
    $token = ioch_api_token();  // Get an authentication token.
    wp_localize_script( 'ozchat-js', 'ozchat_options', array(
        'chat' => array(
            'server_url' => ioch_get_option( IOCH_SETTINGS_SERVER_URL )
        ),
        'token' => $token->token,
        'app'   => $token->appName
    ) );

    
    // Set the labels.
    $label_from_h     = esc_html__( 'From', IOCH_LANGUAGE_DOMAIN );
    $label_content_h  = esc_html__( 'Content', IOCH_LANGUAGE_DOMAIN );
    $label_sent_h     = esc_html__( 'Sent', IOCH_LANGUAGE_DOMAIN );
    $label_room_h     = esc_html__( 'Room', IOCH_LANGUAGE_DOMAIN );
    $label_delete_h   = esc_html__( 'Delete', IOCH_LANGUAGE_DOMAIN );
    $label_save_h     = esc_html__( 'Save', IOCH_LANGUAGE_DOMAIN );
    $label_approved_h = esc_html__( 'Approved', IOCH_LANGUAGE_DOMAIN );

    ?>

    <div  ng-app="ozchat" ng-controller="MessageController" >

    <?php ioch_admin_table_nav( 'top' ); ?>

    <table class="wp-list-table widefat fixed posts">
        <thead>
        <th scope="col" class="manage-column"><?php echo $label_room_h; ?></th>
        <th scope="col" class="manage-column"><?php echo $label_from_h; ?></th>
        <th scope="col" class="manage-column"><?php echo $label_content_h; ?></th>
        <th scope="col" class="manage-column"><?php echo $label_approved_h; ?></th>
        <th scope="col" class="manage-column"><?php echo $label_sent_h; ?></th>
        </thead>

        <tfoot>
        <th scope="col" class="manage-column"><?php echo $label_room_h; ?></th>
        <th scope="col" class="manage-column"><?php echo $label_from_h; ?></th>
        <th scope="col" class="manage-column"><?php echo $label_content_h; ?></th>
        <th scope="col" class="manage-column"><?php echo $label_approved_h; ?></th>
        <th scope="col" class="manage-column"><?php echo $label_sent_h; ?></th>
        </tfoot>

        <tbody id="the-list">
<!--        <tr class="alternate">-->
<!--            <td><input name="name" ng-model="newRoom.name" type="text" placeholder="name"></td>-->
<!--            <td>-->
<!--                <input name="moderated" ng-model="newRoom.moderated" type="checkbox">-->
<!--                <button type="button" ng-click="create(newRoom);" class="button-primary save alignright">--><?php //echo $label_save_h; ?><!--</button>-->
<!--            </td>-->
<!--        </tr>-->
        <tr ng-class="$even ? 'alternate' : ''" ng-repeat="message in data.content">
            <td ng-bind="message.roomName"></td>
            <td ng-bind="message.from"></td>
            <td><input type="text" ng-model="message.content" name="content" /></td>
            <td><input type="checkbox" ng-model="message.accepted"></td>
            <td>
                <div ng-bind="message.created | date : 'short'"></div>
                <button type="button" ng-click="kill(message);" class="button-primary delete alignright"><?php echo $label_delete_h; ?></button>
                <button type="button" ng-click="update(message);" class="button-primary save alignright"><?php echo $label_save_h; ?></button>
            </td>
        </tr>
        </tbody>
    </table>

    <?php ioch_admin_table_nav( 'bottom' ); ?>

    </div>

<?php

}


function ioch_admin_table_nav( $class ) {

?>
    <div class="tablenav <?php echo $class; ?>">

<!--        <div class="alignleft actions bulkactions">-->
<!--            <select name="action">-->
<!--                <option value="-1" selected="selected">Bulk Actions</option>-->
<!--                <option value="delete">Delete Permanently</option>-->
<!--            </select>-->
<!--            <input type="submit" name="" id="doaction" class="button action" value="Apply">-->
<!--        </div>-->
<!--        <div class="alignleft actions">-->
<!--            <select name="m">-->
<!--                <option selected="selected" value="0">All dates</option>-->
<!--                <option value="201407">July 2014</option>-->
<!--                <option value="201308">August 2013</option>-->
<!--                <option value="201307">July 2013</option>-->
<!--                <option value="201306">June 2013</option>-->
<!--            </select>-->
<!--            <input type="submit" name="" id="post-query-submit" class="button" value="Filter">-->
<!--        </div>-->

        <div class="tablenav-pages">
            <span class="displaying-num"><span ng-bind="data.totalElements">197</span> items</span>
            <span class="pagination-links">
                <a class="first-page" ng-click="goToPage(0)" ng-class="data.first ? 'disabled' : ''" title="Go to the first page">«</a>
                <a class="prev-page"  ng-click="goToPage(data.number-1)" ng-class="data.first ? 'disabled' : ''" title="Go to the previous page">‹</a>
                <span class="paging-input"><input class="current-page" title="Current page" type="text" name="paged" ng-model="currentPage" ng-pattern="/\d/" ng-change="goToPage(currentPage - 1)" size="2"> of <span class="total-pages" ng-bind="data.totalPages"></span></span>
                <a class="next-page" ng-click="goToPage(data.number+1)" ng-class="data.last ? 'disabled' : ''"  title="Go to the next page">›</a>
                <a class="last-page" ng-click="goToPage(data.totalPages-1)" ng-class="data.last ? 'disabled' : ''" title="Go to the last page">»</a>
            </span>
        </div>
        <br class="clear">
    </div>

<?php

}