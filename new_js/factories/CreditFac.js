'use strict';

angular.module('filTutorApp')
	.factory('Credit', ['$http', function($http){

		var Credit = this;
		var endpoint = '';

		Credit.get = function(){
			return $http.get(endpoint + '/api/routes.php/credit');
		};

		Credit.getById = function(user_id){
			return $http.get(endpoint + '/api/routes.php/credit/' + user_id);
		}

		Credit.post = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/api/routes.php/credit',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		Credit.update = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/api/routes.php/credit',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		Credit.destroy = function(user_id){
			return $http({
				method: 'POST',
				url: endpoint + '/api/routes.php/credit/',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		return Credit;

	}]);