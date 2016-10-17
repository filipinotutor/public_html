'use strict';

angular.module('filTutorApp')
	.factory('CHistory', ['$http', '$q' , function($http, $q){

		var CHistory = this;
		var endpoint = '/api/routes.php/classhistory';
		var headers =  {'Content-Type' : 'application/x-www-form-urlencoded'};

		CHistory.get = function(){
			var deferred = $q.defer();

			$http.get(endpoint)	
				.then(function(data){
					var data = data.data;

					if(data[0].success) {
						deferred.resolve(data[1]);
					} else {
						deferred.reject('error');
					}

				}, function(err){
					deferred.reject('error');
				});

			return deferred.promise;
		};

		CHistory.getByUserId = function(user_id) {
			
			var deferred = $q.defer();

			$http.get(endpoint + '/user/' + user_id)	
				.then(function(data){
					var data = data.data;

					if(data[0].success) {
						deferred.resolve(data[1]);
					} else {
						deferred.reject('error');
					}

				}, function(err){
					deferred.reject('error');
				});

			return deferred.promise;
		}


		return CHistory;

	}]);