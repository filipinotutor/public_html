'use strict';

angular.module('filTutorApp')
	.factory('Schedule', ['$http', '$q' , function($http, $q){

		var  Schedule = this;
		var endpoint = '/api/routes.php/schedule';
		var headers =  {'Content-Type' : 'application/x-www-form-urlencoded'};

		var deferred = $q.defer();

		Schedule.get = function(){
			$http.get(endpoint)
				.then(function(data){

					var data = data.data;
					
					if(data[0].success) {
						deferred.resolve(data[1]);
					} else {
						// Error
						deferred.reject(data);
					}
				});

			return deferred.promise;
		};
		
		Schedule.getUserSchedule = function(user_id){
			return $http.get(endpoint + '/user/' + user_id);
		};

		Schedule.add = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/add',
				data: userData,
				headers: headers
			});
		}

		Schedule.update = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/update',
				data: userData,
				headers: headers
			});
		}

		Schedule.delete = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/delete',
				data: userData,
				headers: headers
			});
		}


		return Schedule;

	}]);