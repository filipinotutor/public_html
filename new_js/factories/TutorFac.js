'use strict';

var $inject = ['$http','$q', 'Upload', Tutor];

	function Tutor($http, $q, Upload){

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
						console.log('Tutor.get: ' + JSON.stringify(data));
						deferred.reject('Error');
					}
				}, function(err){
					console.log('Tutor.get: ' + JSON.stringify(err));
					deferred.reject('Error');
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
						console.log('Tutor.getProfile: ' + JSON.stringify(data));
						deferred.reject('Error');
					}
				}, function(err){	
					console.log('Tutor.getProfile: ' + JSON.stringify(err));
					deferred.reject('Error');
				});

			return deferred.promise;
		}

		Tutor.add = function(tutorData){
			var deferred = $q.defer();

			$http({
				method: 'POST',
				url: endpoint + '/add',
				data: tutorData,
				headers: headers	
			}).then(function(data){

				var data = data.data;

				if(data.success) {
					deferred.resolve(data);
				} else {
					console.log('Tutor.add: ' + JSON.stringify(data));					
					deferred.reject('Error');
				}

			}, function(err){
				console.log('Tutor.add: ' + JSON.stringify(err));
				deferred.reject('Error');
			});

			return deferred.promise;
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
					console.log('Tutor.update: ' + JSON.stringify(data));					
					deferred.reject('Error');
				}

			}, function(err){
				console.log('Tutor.update: ' + JSON.stringify(err));
				deferred.reject('Error');
			});

			return deferred.promise;

		}

		Tutor.uploadImage = function(file, tutor_id, photo_path) {

			return Upload.upload({
				      url: '/api/routes.php/uploadimage',
				      data: { 
				      			flag: 'tutor', 
				      			user_id: tutor_id, 
				      			file: file,
				      			photo_path: photo_path
				      		}
				    });
		}	

		Tutor.uploadAudio = function(file, tutor_id, audio_path) {

			return Upload.upload({
				      url: '/api/routes.php/uploadaudio',
				      data: { 
				      			user_id: tutor_id, 
				      			file: file,
				      			audio_path: audio_path
				      		}
				    });
		}	


		return Tutor;
	}

angular.module('filTutorApp')
	.factory('Tutor', $inject);