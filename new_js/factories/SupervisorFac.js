'use strict';

angular.module('filTutorApp')
	.factory('Supervisor', ['$http', function($http){

		var Supervisor = this;
		var endpoint = '';

		Supervisor.get = function(){
			return $http.get(endpoint + '/api/routes.php/supervisor');
		};

		Supervisor.getProfile = function(userOrMail){
			return $http.get(endpoint + '/api/routes.php/supervisor/getByUserOrMail/' + userOrMail);
		}

		Supervisor.post = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/api/routes.php/supervisor',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		Supervisor.update = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/api/routes.php/supervisor',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		Supervisor.destroy = function(user_id){
			return $http({
				method: 'POST',
				url: endpoint + '/api/routes.php/supervisor/',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		return Supervisor;

	}]);