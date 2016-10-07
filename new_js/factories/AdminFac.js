'use strict';

angular.module('filTutorApp')
	.factory('Admin', ['$http', function($http){

		var Admin = this;
		var endpoint = '/api/routes.php/admin';
		var headers =  {'Content-Type' : 'application/x-www-form-urlencoded'};


		Admin.get = function(){
			return $http.get(endpoint);
		};

		
		Admin.deactivate = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/user/deactivate',
				data: userData,
				headers: headers
			});
		}

		Admin.activate = function(userData){
			alert(JSON.stringify(userData));
			return $http({
				method: 'POST',
				url: endpoint + '/user/activate',
				data: userData,
				headers: headers
			});
		}


		Admin.post = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/user',
				data: userData,
				headers: headers
			});
		}


		Admin.update = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/user',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		Admin.destroy = function(user_id){
			return $http({
				method: 'POST',
				url: endpoint + '/user/',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		return Admin;

	}]);