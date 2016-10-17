'use strict';

var $inject = ['$http', Admin];

	function Admin($http){

		var Admin = this;
		var endpoint = '/api/routes.php/admin';
		var headers =  {'Content-Type' : 'application/x-www-form-urlencoded'};


		Admin.get = function(){
			return $http.get(endpoint);
		};
		
		Admin.getAdminSettings = function(){
			return $http.get(endpoint + '/settings');
		};


		return Admin;
	}



angular.module('filTutorApp')
	.factory('Admin', $inject);