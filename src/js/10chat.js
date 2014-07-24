jQuery( function( $ ) {

    var id   = 'ozchat-chat';
    var send = 'Send';


    $('body')
        .append('<div class="ozchat-container">' +
                    '<div id="' + id + '">' +
                        '<div class="ozchat-notifier">3+</div>' +
                    '</div>' +
                    '<div class="ozchat-messages">' +
                        '<div id="ozchat-read-messages"></div>' +
                        '<div class="ozchat-write-message"><input type="text" name="message"><button type="button">' + send +
                            '</button></div>' +
                    '</div>' +
                '</div>');

    $('.ozchat-container')
        .draggable({
            start: function() {
                $( '#ozchat-chat').addClass( 'dragging' );
            }
        });

    $('#ozchat-chat')
        .click( function() {
            if ( $( '#ozchat-chat').hasClass( 'dragging' ) ) {
                $( '#ozchat-chat').removeClass( 'dragging' );
            } else {
                $('.ozchat-container').toggleClass( 'expand' );
            }
        } );

    $('.ozchat-container button')
        .click( function() {
            var input = $('.ozchat-container input');
            iochat.sendContent( input.val() );
            input.val('');
        } );

    $('.ozchat-container input')
        .keypress(function (e) {
            if (e.which == 13) {
                var input = $('.ozchat-container input');
                iochat.sendContent( input.val() );
                input.val('');
                e.preventDefault();
            }
        });

    // Connect
    iochat.connect();
} );

window.iochat = {}

iochat.stompClient = null;

iochat.setConnected = function (connected) {
//    document.getElementById('connect').disabled = connected;
//    document.getElementById('disconnect').disabled = !connected;
//    document.getElementById('conversationDiv').style.visibility = connected ? 'visible' : 'hidden';
//    document.getElementById('response').innerHTML = '';
};

iochat.connect = function () {

    jQuery.ajax(ioch_options.server_url + '/1/tokens', {
        type       : 'POST',
        data       : JSON.stringify( ioch_options.user ),
        contentType: 'application/json',
        error      : function() { alert( 'An error occurred.' ); },
        success    : function (data) {
            var socket = new SockJS( ioch_options.server_url + '/auth/' + data);
            iochat.stompClient = Stomp.over(socket);
            iochat.stompClient.connect({}, function (frame) {
                iochat.setConnected(true);
                iochat.stompClient.subscribe('/out/my-app/my-room', function (exchange) {
                    console.log(exchange);
                    iochat.showGreeting(JSON.parse(exchange.body).content);
                });
            });

        }
    });
};

iochat.disconnect = function () {
    iochat.stompClient.disconnect();
    iochat.setConnected(false);
    console.log("Disconnected");
};

iochat.sendContent = function ( content ) {
    iochat.stompClient.send("/in/my-app/my-room", {}, JSON.stringify({ 'content': content }));
};

iochat.showGreeting = function (message) {
    jQuery('#ozchat-read-messages')
        .append( '<p>' + message + '</p>' )
        .scrollTop( jQuery('#ozchat-read-messages')[0].scrollHeight );
};