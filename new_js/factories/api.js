'use strict';

angular.module('filTutorApp')
    .factory('api', [
        '$http',
        function ($http) {
            var api = this;
            var endpoint = '';

            api.getUserData = function() {
                return $http.get(endpoint + '/api/userAPI.php');
            }

            api.postUserData = function(userData) {
                return $http({
                    method: 'POST',
                    url: endpoint + '/api/userAPI.php/user',
                    data: userData,
                    headers: {'Content-Type' : 'application/x-www-form-urlencoded'}
                });
            }


            return api;
        }
    ]);
