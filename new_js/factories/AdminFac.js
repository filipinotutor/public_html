'use strict';

angular.module('filTutorApp')
	.factory('Admin', ['$http', function($http){

		var Admin = this;
		var endpoint = '/api/routes.php/admin';
		var headers =  {'Content-Type' : 'application/x-www-form-urlencoded'};


		Admin.get = function(){
			return $http.get(endpoint);
		};
		
		Admin.getAdminSettings = function(){
			return $http.get(endpoint + '/settings');
		}

		// Admin.post = function(userData){
		// 	return $http({
		// 		method: 'POST',
		// 		url: endpoint + '/user',
		// 		data: userData,
		// 		headers: headers
		// 	});
		// }

		return Admin;

	}]);