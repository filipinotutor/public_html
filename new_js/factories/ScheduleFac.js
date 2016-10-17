'use strict';

var $inject = ['$http', '$q' , Schedule];

angular.module('filTutorApp')
	.factory('Schedule', $inject);
	 
		function Schedule($http, $q){

			var  Schedule = this;
			var endpoint = '/api/routes.php/schedule';
			var headers =  {'Content-Type' : 'application/x-www-form-urlencoded'};

			Schedule.get = function(){

				var deferred = $q.defer();

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
				var deferred = $q.defer();

				$http({
					method: 'POST',
					url: endpoint + '/user/'+ user_id,
					data: userData,
					headers: headers
				}).then(function(data){
					var data = data.data;

					deferred.resolve(data);

				}, function(err){
					
					console.log('Schedule.getUserSchedule: ' + JSON.stringify(err));
					
					deferred.reject('error');
				});

				return deferred.promise;
			};

			Schedule.add = function(userData){
				var deferred = $q.defer();

				$http({
					method: 'POST',
					url: endpoint + '/add',
					data: userData,
					headers: headers
				}).then(function(data){
					var data = data.data;

					deferred.resolve(data);

				}, function(err){
					
					console.log('Schedule.add: ' + JSON.stringify(err));
					
					deferred.reject('error');
				});

				return deferred.promise;
			}

			Schedule.update = function(userData){
				var deferred = $q.defer();

				$http({
					method: 'POST',
					url: endpoint + '/update',
					data: userData,
					headers: headers
				}).then(function(data){
					var data = data.data;

					deferred.resolve(data);

				}, function(err){
					
					console.log('Schedule.update: ' + JSON.stringify(err));
					
					deferred.reject('error');
				});

				return deferred.promise;

			}

			Schedule.delete = function(userData){
				var deferred = $q.defer();

				$http({
					method: 'POST',
					url: endpoint + '/delete',
					data: userData,
					headers: headers
				}).then(function(data){
					var data = data.data;

					deferred.resolve(data);

				}, function(err){

					console.log('Schedule.delete: ' + JSON.stringify(err));

					deferred.reject('error');
				});

				return deferred.promise;
			}


			return Schedule;

		}