'use strict';

angular.module('filTutorApp')
	.factory('Tutor', ['$http','$q' , function($http, $q){

		var Tutor = this;
		var endpoint = '';
		var deferred = $q.defer();


		Tutor.get = function(){
			$http.get(endpoint + '/api/routes.php/tutor')
				.then(function(data){
					deferred.resolve(data);
				});

			return deferred.promise;

		};

		Tutor.getProfile = function(userOrMail){
			return $http.get(endpoint + '/api/routes.php/tutor/getByUserOrMail/' + userOrMail);
		}

		Tutor.getProfile1 = function(userOrMail){
			$http.get(endpoint + '/api/routes.php/tutor/getByUserOrMail/' + userOrMail)
				.then(function(data){
					deferred.resolve(data.data);
				});

			return deferred.promise;
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