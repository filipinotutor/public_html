'use strict';

angular.module('filTutorApp')
	.factory('Tutor', ['$http', function($http){

		var Tutor = this;
		var endpoint = '';

		Tutor.get = function(){
			return $http.get(endpoint + '/api/routes.php/tutor');
		};

		Tutor.getProfile = function(userName){
			return $http.get(endpoint + '/api/routes.php/tutor/getByUserName/' + userName);
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