// See http://jqueryui.com/widget/ for a reference.

jQuery( function ( $ ) {

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

            // Connect.
            var serverURL = ozchat_admin_options.chat.server_url;
            var user      = ozchat_admin_options.chat.user;

            $.ajax( serverURL + '/1/tokens', {
                type       : 'POST',
                data       : JSON.stringify( user ),
                contentType: 'application/json',
                error      : function() { alert( 'An error occurred.' ); },
                success    : function ( data ) {

                    var socket = new SockJS( serverURL + '/auth/' + data);
                    ozchat.client = Stomp.over(socket);
                    ozchat.client.connect( {}, function ( frame ) {

                        // Set the first connection.
                        ozchat.connected   = true;
                        ozchat.connections = 1;

                        callback();

                    });

                }
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
         * @param content
         */
        ozchat.send = function ( content, room ) {
            ozchat.client.send( '/in/my-app/' + room, {}, JSON.stringify( { 'content': content } ) );
        }

        window.ozchat = ozchat;

    }

    /**
     * Create the jQuery UI Widget.
     */
    $.widget( 'ozchat.ozchat', {

        // Set up the options.
        options: {
            room  : 'my-room',
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
            var $chat      = $( '<div class="ozchat-chat"><div class="ozchat-notifier"></div></div>' );

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
                    start: function() { $chat.addClass( 'dragging' ); }
                } );

            // Create some references to commonly used elements.
            $notifier     = $chat.children( '.ozchat-notifier' );
            $readmessages = $messages.children( '.ozchat-read-messages' );
            $textarea     = $container.find( 'textarea' )

            // Make the messages pane resizable.
            $messages.resizable();

            // Open/close the messages pane when the chat circle is clicked.
            $chat.click( function() {
                if ( $chat.hasClass( 'dragging' ) )
                    $chat.removeClass( 'dragging' );
                else
                    $container.toggleClass( 'expand' );

            } );

            // Hook to the CTRL+Enter key of the text area.
            $textarea.keypress( function ( e ) {

                if ( e.ctrlKey &&  e.which == 13 ) {

                    // Get the element, send the content using the *ozchat* reference.
                    ozchat.send( $textarea.val(), that.options.room );
                    $textarea.val('');

                    e.preventDefault();

                }

            });

            // Hook to the button click.
            $container.find( 'button' ).click( function( e ) {

                // Get the element, send the content using the *ozchat* reference.
                ozchat.send( $textarea.val(), that.options.room );
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

                var cls = 'message' + ( undefined === params.cls ? '' : ' ' + params.cls );

                $readmessages
                    .append( '<p class="' + cls +  '">' + params.content + '</p>' )
                    .scrollTop( $messages[0].scrollHeight );

                // TODO: manage the unread messages.
                $notifier.html( 9 < ++unread ? '9+' : unread );

            };

            // Connect the *ozchat* and subscribe to the channel or, if we're already connected, .
            appendMessage( { content: that.options.labels.connectingTo + ' ' + that.options.room, cls: 'ozchat-system' } );
            ozchat.connect( function() {

                appendMessage( { content: that.options.labels.connectedTo + ' ' + that.options.room, cls: 'ozchat-system' } );

                ozchat.subscribe( 'my-app', that.options.room, function ( e ) {

                    appendMessage( { content: JSON.parse(e.body).content } );

                } );
            } );

        }

    } );

} );