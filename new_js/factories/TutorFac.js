'use strict';

angular.module('filTutorApp')
	.factory('Tutor', ['$http','$q', 'Upload', function($http, $q, Upload){

		var Tutor = this;
		var endpoint = '/api/routes.php/tutor';
		var deferred = $q.defer();

		Tutor.get = function(){
			$http.get(endpoint )
				.then(function(data){
					deferred.resolve(data);
				});

			return deferred.promise;

		};

		Tutor.getProfile = function(userOrMail){
			return $http.get(endpoint + '/getByUserOrMail/' + userOrMail);
		}

		Tutor.getProfile1 = function(userOrMail){
			$http.get(endpoint + '/getByUserOrMail/' + userOrMail)
				.then(function(data){
					deferred.resolve(data.data);
				});

			return deferred.promise;
		}

		Tutor.add = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/add',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		Tutor.update = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/update',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		Tutor.uploadImage = function(file, tutor_id) {
			return Upload.upload({
				      url: '/api/routes.php/uploadimage',
				      data: { flag: 'tutor', user_id: tutor_id, file: file }
				    });
		}	



		return Tutor;

	}]);