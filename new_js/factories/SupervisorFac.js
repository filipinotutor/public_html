'use strict';

angular.module('filTutorApp')
	.factory('Supervisor', ['$http', function($http){

		var Supervisor = this;
		var endpoint = '/api/routes.php/supervisor';

		Supervisor.get = function(){
			return $http.get(endpoint);
		};

		Supervisor.getProfile = function(userOrMail){
			return $http.get(endpoint + '/getByUserOrMail/' + userOrMail);
		}

		Supervisor.add = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/add',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		Supervisor.update = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/update',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		return Supervisor;

	}]);