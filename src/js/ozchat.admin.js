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

            /**
             * Performs a POST.
             *
             * @param path
             * @param data
             * @param callback
             * @returns {*}
             */
            post: function( path, data, callback ) { return this.request( { method: 'POST', path: path, callback: callback, data: data } ); },

            /**
             * Performs a DELETE.
             *
             * @param path
             * @param callback
             * @returns {*}
             */
            kill: function( path, callback ) { return this.request( { method: 'DELETE', path: path, callback: callback } )  },

            /**
             * Performs a PUT.
             *
             * @param path
             * @param data
             * @param callback
             * @returns {*}
             */
            update: function( path, data, callback ) { return this.request( { method: 'PUT', path: path, callback: callback, data: data } ); }
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

            /**
             * Create a new room.
             *
             * @param newRoom
             * @param callback
             */
            create: function( newRoom, callback ) { ApiService.post( endPoints.rooms, newRoom, callback ); }

        };

    } ] )
/**
 * The MessageService provides access to messages.
 */
    .service( 'MessageService', [ 'ApiService', 'endPoints', function ( ApiService, endPoints ) {

        return {
            /**
             * List the messages.
             *
             * @param callback A function to call when data is received from the server.
             */
            list  : function( callback ) { ApiService.get( endPoints.messages, callback ); },

            /**
             * Delete the specified message.
             *
             * @param message The message to delete.
             * @param callback The callback to call after the operation completes.
             */
            kill: function( message, callback ) { ApiService.kill( endPoints.messages + '&p=' + message.id, callback ); },

            /**
             * Update the specified message.
             *
             * @param message The message to update.
             * @param callback The callback to call after the operation completes.
             */
            update: function( message, callback ) { ApiService.update( endPoints.messages + '&p=' + message.id, message, callback ); }

        }

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

    } ] )
    .controller( 'MessageController', [ 'MessageService', '$scope', function( MessageService, $scope ) {

        $scope.messages = [];

        /**
         * Refresh the list of messages.
         */
        $scope.refresh = function() { MessageService.list( function ( data ) { $scope.messages = data.content } ); }

        /**
         * Delete the specified message.
         *
         * @param message
         */
        $scope.kill = function( message ) { MessageService.kill( message, function( data ) { $scope.refresh(); } ); };

        /**
         * Save the specified message.
         *
         * @param message
         */
        $scope.update = function( message ) { MessageService.update( message, function( data ) { $scope.refresh(); } ); };

        $scope.refresh();

    } ] );