'use strict';

angular.module('filTutorApp')
	.factory('User', ['$http', function($http){

		var User = this;
		var endpoint = '/api/routes.php';
		var headers =  {'Content-Type' : 'application/x-www-form-urlencoded'};


		User.get = function(){
			return $http.get(endpoint + '/user');
		};

		User.getLoggedInUser = function(){
			return $http.get(endpoint + '/user/loggedin');
		};

		User.deactivate = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/user/deactivate',
				data: userData,
				headers: headers
			});
		}

		User.activate = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/user/activate',
				data: userData,
				headers: headers
			});
		}

		User.changePw = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/user/changepw',
				data: userData,
				headers: headers
			});
		}

		User.post = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/user',
				data: userData,
				headers: headers
			});
		}


		User.update = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/user',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		User.destroy = function(user_id){
			return $http({
				method: 'POST',
				url: endpoint + '/user/',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		return User;

	}]);