'use strict';

var $inject = ['$http', '$q', 'Upload', Supervisor];


angular.module('filTutorApp')
	.factory('Supervisor', $inject);


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
					deferred.reject('error');
				}
			}, function(err){
				deferred.reject('error');
			});

		return deferred.promise;
	};

	Supervisor.getProfile = function(userOrMail){
		
		$http.get(endpoint + '/getByUserOrMail/' + userOrMail)
			.then(function(data){
				var data = data.data;
				if(data[0].success) {
					deferred.resolve(data[1][0]);
				} else {
					deferred.reject('error');
				}
			}, function(err){
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

}