'use strict';

var $inject = ['$http', '$q', 'Upload', Supervisor];

	function Supervisor($http, $q, Upload){

		var Supervisor = this;
		var endpoint = '/api/routes.php/supervisor';


		Supervisor.get = function(){
			
			var deferred = $q.defer();

			$http.get(endpoint)
				.then(function(data){
					var data = data.data;
					if(data[0].success) {

						deferred.resolve(data[1]);
					} else {
						console.log('Supervisor.get1 ' + JSON.stringify(data))
						deferred.reject('error');
					}
				}, function(err){
					console.log('Supervisor.get2 ' + JSON.stringify(err))
					deferred.reject('error');
				});

			return deferred.promise;
		};

		Supervisor.getProfile = function(userOrMail){
			
			var deferred = $q.defer();
			
			$http.get(endpoint + '/getByUserOrMail/' + userOrMail)
				.then(function(data){
					var data = data.data;
					if(data[0].success) {
						deferred.resolve(data[1][0]);
					} else {
						console.log('Supervisor.getProfile1 ' + JSON.stringify(data))
						deferred.reject('error');
					}
				}, function(err){
					console.log('Supervisor.getProfile2 ' + JSON.stringify(err))
					deferred.reject('error');
				});

			return deferred.promise;
		}

		Supervisor.list = function() {

			var deferred = $q.defer();
			
			$http.get(endpoint + '/list')
				.then(function(data){
					var data = data.data;
					
					if(data[0].success) {
						deferred.resolve(data[1]);
					} else {
						console.log('Supervisor.list1' + JSON.stringify(data));
						deferred.reject(error);
					}

				}, function(err){
					console.log('Supervisor.list2' + JSON.stringify(err));
					deferred.reject('Error');
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

		Supervisor.getAssignedTutors = function(sup_id) {

			var deferred = $q.defer();
			
			$http.get(endpoint + '/assignedtutor/' + sup_id)
				.then(function(data){
					var data = data.data;
					
					if(data[0].success) {
						deferred.resolve(data[1]);
					} else {
						console.log('Supervisor.getAssignedTutor' + JSON.stringify(data));
						deferred.reject(error);
					}

				}, function(err){
					console.log('Supervisor.getAssignedTutor' + JSON.stringify(err));
					deferred.reject('Error');
				});

			return deferred.promise;
		}


		return Supervisor;

	}


angular.module('filTutorApp')
	.factory('Supervisor', $inject);
