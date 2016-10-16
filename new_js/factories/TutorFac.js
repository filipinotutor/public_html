'use strict';

var $inject = ['$http','$q', 'Upload', Tutor];

angular.module('filTutorApp')
	.factory('Tutor', $inject);

function User($http, $q, Upload){

	var Tutor = this;
	var endpoint = '/api/routes.php/tutor';
	var headers = {'Content-Type' : 'application/x-www-form-urlencoded'};
	var fields = { 
					'tutor_id': '', 
					'phone': '', 
					'birthday': '', 
					'ed_level': '', 
					'school': '', 
					'attending': '', 
					'teaching_exp': '', 
		 			'hobby': '', 
		 			'self_intro': '', 
		 			'bank_name': '', 
		 			'bank_branch': '', 
		 			'accnt_name': '', 
		 			'accnt_number': '',
		 			'supervisor_id': '', 
		 			'tutor_type_id': '', 
		 			'rate': '',
		 			'last_update_id': ''
		 		};

	Tutor.fields = function() {

		// emptying tutorfields;
		angular.forEach(fields, function(value, key){
			fields[key] = '';
		});

		return fields;
	}

	Tutor.get = function(){
		
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

	Tutor.getProfile = function(userOrMail){

		var deferred = $q.defer();

		$http.get(endpoint + '/getByUserOrMail/' + userOrMail)
			.then(function(data){
				var data = data.data;
				if(data[0].success){
					deferred.resolve(data[1][0]);
				} else {
					deferred.reject('error');
				}
			}, function(err){	
				deferred.reject('error');
			});

		return deferred.promise;
	}

	Tutor.add = function(userData){
		return $http({
			method: 'POST',
			url: endpoint + '/add',
			data: userData,
			headers: header
		});
	}

	Tutor.update = function(userData){

		var deferred = $q.defer();

		$http({
			method: 'POST',
			url: endpoint + '/update',
			data: userData,
			headers: headers	
		}).then(function(data){

			var data = data.data;

			if(data.success) {
				deferred.resolve(data);
			} else {
				deferred.reject('error');
			}

		}, function(err){
			deferred.reject('error' + JSON.stringify(err));
		});

		return deferred.promise;

	}

	Tutor.uploadImage = function(file, tutor_id) {
		return Upload.upload({
			      url: '/api/routes.php/uploadimage',
			      data: { flag: 'tutor', user_id: tutor_id, file: file }
			    });
	}	


	return Tutor;
}