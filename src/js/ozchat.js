// See http://jqueryui.com/widget/ for a reference.

jQuery( function ( $ ) {

    // Connect.
    var serverURL = ozchat_options.chat.server_url;
    var token     = ozchat_options.token;
    var appName   = ozchat_options.app;


    // Create the ozchat channel if it's not yet created.
    if ( undefined === ozchat ) {

        var ozchat = {};

        ozchat.client      = null;
        ozchat.connected   = false;
        ozchat.connections = 0;

        /**
         * Connect to the remote server, then fire the callback. If the instance is already connected, we just fire
         * the callback.
         *
         * @param callback The callback to fire after connection.
         */
        ozchat.connect = function ( callback ) {

            // We're already connected, fire the callback right away.
            if ( ozchat.connected ) {
                ozchat.connections++;
                return callback();
            }

            var socket = new SockJS( serverURL + '/auth/' + token, {}, {
//                protocols_whitelist: ['xhr-polling']
            });
            ozchat.client = Stomp.over(socket);
            ozchat.client.connect( {}, function ( frame ) {

                // Set the first connection.
                ozchat.connected   = true;
                ozchat.connections = 1;

                callback();

            });

        }

        /**
         * Subscribe a callback function to an app/room.
         *
         * @param app The app name.
         * @param room The room name.
         * @param callback The callback to fire when a message is received.
         */
        ozchat.subscribe = function( app, room, callback ) {

            ozchat.client.subscribe( '/out/' + app + '/' + room, callback );

        }

        /**
         * Send the specified content to the specified room.
         *
         * @param content The message.
         * @param app The recipient app name.
         * @param room The recipient room.
         */
        ozchat.send = function ( content, app, room ) {
            ozchat.client.send( '/in/' + app + '/' + room, {}, JSON.stringify( { 'content': content } ) );
        }

        window.ozchat = ozchat;

    }

    /**
     * Create the jQuery UI Widget.
     */
    $.widget( 'ozchat.ozchat', {

        // Set up the options.
        options: {
            app   : appName,
            room  : 'default-room',
            labels: {
                send        : 'Send',
                connectingTo: 'Connecting to',
                connectedTo : 'Connected to'
            }
        },

        _create: function () {

            var that       = this;
            var unread     = 0;
            var $container = this.element;

            // Create the chat notifier.
            var $chat      = $(
                '<div class="ozchat-chat">' +
                    '<div class="ozchat-room-name">' + this.options.room + '</div>' +
                    '<div class="ozchat-notifier"></div>' +
                '</div>'
            );

            // Create the messages panel.
            var $messages   = $(
                '<div class="ozchat-messages ui-widget-content">' +
                    '<div class="ozchat-read-messages"></div>' +
                    '<div class="ozchat-textbox">' +
                    '<textarea name="message"></textarea></div><div class="ozchat-submit"><button type="button">' + this.options.labels.send +
                        '</button></div>' +
                '</div>'
            );

            // Build the object.
            $container
                .addClass( 'ozchat-container' )
                .append( $chat )
                .append( $messages )
                .draggable( {
                    start   : function() { $chat.addClass( 'dragging' ); },
                    handle  : '.ozchat-chat',
                    appendTo: 'body'
                } );

            // Create some references to commonly used elements.
            var $notifier     = $chat.children( '.ozchat-notifier' );
            var $readmessages = $messages.children( '.ozchat-read-messages' );
            var $textarea     = $messages.children( '.ozchat-textbox').children( 'textarea' );

            // Make the messages pane resizable.
            $messages.resizable( { alsoResize: $container, minWidth: 200, minHeight: 300 } );

            // Open/close the messages pane when the chat circle is clicked.
            $chat.click( function() {
                if ( $chat.hasClass( 'dragging' ) ) {
                    $chat.removeClass( 'dragging' );
                } else {
                    $container.toggleClass( 'expand' );

                    // Hide the notifier.
                    if ( $container.hasClass( 'expand' ) ) {
                        $notifier.hide();
                        unread = 0;
                    }
                }

            } );

            // Hook to the CTRL+Enter key of the text area.
            $textarea.keypress( function ( e ) {

                if ( 13 === e.which && ! e.ctrlKey && '' !== $(e.target).val() ) {

                    // Get the element, send the content using the *ozchat* reference.
                    ozchat.send( $(e.target).val(), that.options.app, that.options.room );
                    $(e.target).val('');

                    e.preventDefault();

                }

            });

            // Hook to the button click.
            $container.find( 'button' ).click( function( e ) {

                // If the text area is empty, just return.
                if ( '' === $textarea.val() ) {
                    return;
                }

                // Get the element, send the content using the *ozchat* reference.
                ozchat.send( $textarea.val(), that.options.app, that.options.room );
                $textarea.val('');

                e.preventDefault();

            } );


            /**
             * Append the provided content to the messages pane.
             *
             * @param content The message content.
             * @param class   An optional stylesheet class.
             */
            var appendMessage = function ( params ) {

                var cls     = 'message' + ( undefined === params.cls ? '' : ' ' + params.cls );
                var id      = ( undefined !== params.message.id ? params.message.id : 'noid ');
                var content = params.message.content;

                $readmessages
                    .append( '<p id="ozchat-message-' + id + '" class="' + cls +  '">' +
                        ( undefined !== params.message.from ? '<span class="ozchat-message-from">[' + params.message.from + ']</span>' : '' ) +
                        '<span class="ozchat-message-content">' + content + '</span></p>' )
                    .scrollTop( $readmessages[0].scrollHeight );

                // Update the notifier if the panel has no focus.
                if ( ! $container.hasClass( 'expand' ) && 'ozchat-system' !== params.cls ) {
                    $notifier
                        .html( 9 < ++unread ? '9+' : unread )
                        .show();
                }

            };

            /**
             * Execute a command.
             * @param command
             */
            var execute = function( command ) {

                switch (command.type) {
                    case 'MESSAGE':
                    case 'REPLACE':

                        // Get the message data.
                        var id      = command.payload.id;
                        var from    = command.payload.from;
                        var content = command.payload.content;

                        // Prepare the message HTML.
                        var html    =
                            '<span class="ozchat-message-from">[' + from + ']</span>' +
                            '<span class="ozchat-message-content">' + content + '</span>';


                        // Append or replace the message accordingly.
                        if ( 'MESSAGE' === command.type )
                            $readmessages
                                .append( '<p id="ozchat-message-' + id + '" class="ozchat-message">' + html + '</p>' )
                                .scrollTop( $readmessages[0].scrollHeight );
                        else
                            $( '#ozchat-message-' + id).html( html );

                        break;

                    case 'DELETE':
                        $readmessages.children( '#ozchat-message-' + command.payload).remove();
                        break;

                    case 'JOIN':
                        $readmessages
                            .append( '<p class="ozchat-system">' + command.payload + ' joined the room...</p>')
                            .scrollTop( $readmessages[0].scrollHeight );
                        break;

                    default:
                        alert('unknown command: ' + command.type);
                }
            };

            // Connect the *ozchat* and subscribe to the channel or, if we're already connected, .
            appendMessage( { message: { content: that.options.labels.connectingTo + ' ' + that.options.room }, cls: 'ozchat-system' } );
            ozchat.connect( function() {

                appendMessage( { message: { content: that.options.labels.connectedTo + ' ' + that.options.room }, cls: 'ozchat-system' } );

                ozchat.subscribe( that.options.app, that.options.room, function ( e ) {

                    // console.log(e);

                    var message = JSON.parse(e.body);

                    if ( undefined !== message.type ) {
                        // It's a command.
                        execute( message );
                    } else {
                        // It's a message.
                        appendMessage( { message: message } );
                    }

                } );
            } );

        }

    } );

} );