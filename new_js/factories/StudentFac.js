'use strict';

var $inject = ['$http', 'Upload', '$q', 'StudentSess', Student];

 	function Student($http, Upload, $q, StudentSess){

		var Student = this;
		var endpoint = '/api/routes.php/student';
		var header = {'Content-Type' : 'application/x-www-form-urlencoded'};

		var fields = {
						'student_id' : '',
						'nick_name' : '',
						'phone' : '',
						'photo' : '',
						'birthday' : '',
						'viewed' : '',
						'last_update' : '',
						'last_update_id' : ''
					 }

		Student.fields = function() {
			
			angular.forEach(fields, function(value, key){
				fields[key] = '';
			});

			return fields;
		}

		Student.get = function(){
			var dfr = $q.defer();

			$http.get(endpoint)
				.then(function(data){

					var data = data.data;

					if(data[0].success){
						
						StudentSess.storeStudentData(data[1]);
						dfr.resolve(data[1]);

					} else {
						console.log('StudentFac.get() ' + JSON.stringify(data))						
						dfr.reject('Error');
					}

				}, function(err){
					console.log('StudentFac.get() ' + JSON.stringify(err));
				});

			return dfr.promise;
		};

		Student.getProfile = function(userOrMail){

			var dfr = $q.defer();

			$http.get(endpoint + '/getByUserOrMail/' + userOrMail)
				.then(function(data){
					var data = data.data;

					if(data[0].success){
						
						var stud_data = data[1][0];
						StudentSess.putProfileData(stud_data.user_id, stud_data);												
						dfr.resolve(stud_data);

					} else {
						console.log('Error' + JSON.stringify(data));
						dfr.reject('Error');
					}

				}, function(err){
					console.log('Error' + JSON.stringify(err));
					dfr.reject('Error');
				});

			return dfr.promise;
		}


		Student.update = function(studData){
			
			var dfr = $q.defer();

			$http({
				method: 'POST',
				url: endpoint + '/update', 
				data: studData,
				headers: header
			}).then(function(data){

				var data = data.data;

				if(data.success){
					dfr.resolve(data);
				} else {
					console.log('StudentFac.update: ' + JSON.stringify(data));
					dfr.resolve('Error');
				}

			}, function(err){
				console.log('StudentFac.update: ' + JSON.stringify(err));
				dfr.reject('Error');
			});
		
			return dfr.promise;
		}

		Student.uploadImage = function(file, student_id, photo_path) {

			return Upload.upload({
				      url: '/api/routes.php/uploadimage',
				      data: { 
				      			flag: 'student', 
				      			user_id: tutor_id, 
				      			file: file,
				      			photo_path: photo_path
				      		}
				    });
		}	

		Student.destroy = function(user_id){
			return $http({
				method: 'POST',
				url: endpoint, 
				data: userData,
				headers: header	
			});
		}

		Student.uploadImage = function(file, stud_id) {
			return Upload.upload({
				      url: '/api/routes.php/uploadimage',
				      data: { flag: 'student', user_id: stud_id, file: file }
				 });
		}

		return Student;

	}

angular.module('filTutorApp')
	.factory('Student', $inject);