'use strict';

angular.module('filTutorApp')
	.factory('Tutor', ['$http', function($http){

		var Tutor = this;
		var endpoint = '';

		Tutor.get = function(){
			return $http.get(endpoint + '/api/routes.php/tutor');
		};

		Tutor.getById = function(user_id){
			return $http.get(endpoint + '/api/routes.php/tutor/' + user_id);
		}

		Tutor.post = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/api/routes.php/tutor',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		Tutor.update = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/api/routes.php/tutor',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		Tutor.destroy = function(user_id){
			return $http({
				method: 'POST',
				url: endpoint + '/api/routes.php/tutor/',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		return Tutor;

	}]);