<?php
/**
 */

function ioch_admin_settings_messages_section_callback() {

    // Set the labels.
    $label_from_h     = esc_html__( 'From', IOCH_LANGUAGE_DOMAIN );
    $label_content_h  = esc_html__( 'Content', IOCH_LANGUAGE_DOMAIN );
    $label_sent_h     = esc_html__( 'Sent', IOCH_LANGUAGE_DOMAIN );
    $label_room_h     = esc_html__( 'Room', IOCH_LANGUAGE_DOMAIN );
    $label_delete_h   = esc_html__( 'Delete', IOCH_LANGUAGE_DOMAIN );
    $label_save_h     = esc_html__( 'Save', IOCH_LANGUAGE_DOMAIN );
    $label_approved_h = esc_html__( 'Approved', IOCH_LANGUAGE_DOMAIN );

    ?>

    <table class="wp-list-table widefat fixed posts" ng-app="ozchat" ng-controller="MessageController">
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
        <tr ng-class="$even ? 'alternate' : ''" ng-repeat="message in messages">
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

<?php

}