'use strict';

var $inject = ['$http', '$q', CHistory];

	function CHistory($http, $q){

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
						console.log('CHistory.get1: ' + JSON.stringify(data));
					}

				}, function(err){
					console.log('CHistory.get2: ' + JSON.stringify(err));
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
						console.log('CHistory.getByUserId1: ' + JSON.stringify(data));
						deferred.reject('error');
					}

				}, function(err){
					console.log('CHistory.getByUserId2: ' + JSON.stringify(err));
					deferred.reject('error');
				});

			return deferred.promise;
		}


		return CHistory;

	}

angular.module('filTutorApp')
	.factory('CHistory', $inject);