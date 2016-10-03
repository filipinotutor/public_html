'use strict';

angular.module('filTutorApp')
	.factory('User', ['$http', function($http){

		var User = this;
		var endpoint = '';

		User.get = function(){
			return $http.get(endpoint + '/api/routes.php/user');
		};

		User.getLoggedInUser = function(){
			return $http.get(endpoint + '/api/routes.php/user/loggedin');
		};

		User.getById = function(user_id){
			return $http.get(endpoint + '/api/routes.php/user/' + user_id);
		}

		User.post = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/api/routes.php/user',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		User.update = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/api/routes.php/user',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		User.destroy = function(user_id){
			return $http({
				method: 'POST',
				url: endpoint + '/api/routes.php/user/',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		return User;

	}]);