angular.module( 'ozchat', [] )
    .value( 'serverURL', ozchat_admin_options.server_url )
    .value( 'endPoints', ozchat_admin_options.end_points )
    .service( 'ApiService', [ 'serverURL', '$http', function ( serverURL, $http ) {

        return {

            /**
             * Performs a request to the remote server.
             *
             * @param method The request method.
             * @param path The request path.
             * @param callback The callback to call when data is received from the server.
             */
            request: function ( params ) {

                $http( { method: params.method, url: serverURL + params.path, data: params.data } )
                    .success( function( data, status, headers, config ) {
                        // this callback will be called asynchronously
                        // when the response is available
                        params.callback( data, status, headers, config  )
                    })

            },

            /**
             * Performs a GET request to the remote server.
             *
             * @param path The request path.
             * @param callback The callback to call when data is received from the server.
             */
            get : function( path, callback ) { return this.request( { method: 'GET', path: path, callback: callback } ); },

            post: function( path, data, callback ) { return this.request( { method: 'POST', path: path, callback: callback, data: data } ); }

        };

    } ] )
/**
 * The RoomService provides access to rooms data.
 */
    .service( 'RoomService', [ 'ApiService', 'endPoints', function ( ApiService, endPoints ) {

        return {
            /**
             * List the rooms.
             *
             * @param callback A function to call when data is received from the server.
             */
            list  : function( callback ) { ApiService.get( endPoints.rooms, callback ); },

            create: function( newRoom, callback ) { ApiService.post( endPoints.rooms, newRoom, callback ); }

        };

    } ] )
    .controller( 'RoomController', [ 'RoomService', '$scope', function( RoomService, $scope ) {

        // Initialize the scope.
        $scope.rooms   = [];

        /**
         * Refresh the list of rooms.
         */
        $scope.refresh = function() { RoomService.list( function( data ) { $scope.rooms = data.content; } ); };

        /**
         * Create a new Room using the provided data. The scope is refreshed when the response is received from the
         * server.
         *
         * @param newRoom The room data.
         */
        $scope.create  = function( newRoom ) { RoomService.create( newRoom, function () { // Refresh the rooms.
                $scope.refresh(); } );
        };

        /**
         * Open a widget on the room (requires jQuery and the ozchat widget).
         *
         * @param room The room.
         */
        $scope.open = function( room ) { jQuery('<div></div>').appendTo('body').ozchat( { room: room.name } ); }

        // Refresh the rooms.
        $scope.refresh();

    } ] );