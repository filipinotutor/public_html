'use strict';

angular.module('filTutorApp')
	.factory('Supervisor', ['$http', '$q', 'Upload', function($http, $q, Upload){

		var Supervisor = this;
		var endpoint = '/api/routes.php/supervisor';
		var deferred = $q.defer();

		Supervisor.get = function(){
			return $http.get(endpoint);
		};

		Supervisor.getProfile = function(userOrMail){
			return $http.get(endpoint + '/getByUserOrMail/' + userOrMail);
		}

		Supervisor.list = function() {
			$http.get(endpoint + '/list')
				.then(function(data){
					var data = data.data;
					
					if(data[0].success) {
						deferred.resolve(data[1]);
					} else {
						deferred.reject(error);
						consoe.log('error Supervisor List');
					}

				}, function(error){
					deferred.reject(error);
				});

			return deferred.promise;
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

		Supervisor.uploadImage = function(file, sup_id) {
			return Upload.upload({
				      url: '/api/routes.php/uploadimage',
				      data: { flag: 'supervisor', user_id: sup_id, file: file }
				 });
		}	

		return Supervisor;

	}]);