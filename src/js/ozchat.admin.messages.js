jQuery( function ( $ ) {
    
    var ozOptions = $.extend(ozchat_options, ozchat_admin_options);
    
    ozchat.connect( function() {

        //console.log(ozchat);
        
        roomsListUrl = ozOptions.server_url + ozOptions.end_points.rooms;
        $.getJSON( roomsListUrl, function( data ){
            data.content.forEach( function( room ) {
                console.log( room );
                ozchat.subscribe( ozOptions.app, room.name, function( mex ){
                    
                    mex = JSON.parse(mex.body);
                    
                    if( mex.type === 'MESSAGE' ) {
                        console.log( mex.payload.content );
                    }
                });
            });
        });
    });
});