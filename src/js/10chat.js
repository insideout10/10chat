window.iochat = {}

iochat.stompClient = null;

iochat.setConnected = function (connected) {
    document.getElementById('connect').disabled = connected;
    document.getElementById('disconnect').disabled = !connected;
    document.getElementById('conversationDiv').style.visibility = connected ? 'visible' : 'hidden';
    document.getElementById('response').innerHTML = '';
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

iochat.sendContent = function () {
    var content = document.getElementById('content').value;
    iochat.stompClient.send("/in/my-app/my-room", {}, JSON.stringify({
        'content': content
    }));
};

iochat.showGreeting = function (message) {
    var response = document.getElementById('response');
    var p = document.createElement('p');
    p.style.wordWrap = 'break-word';
    p.appendChild(document.createTextNode(message));
    response.appendChild(p);
};