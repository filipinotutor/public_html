'use strict';

var $inject = ['$http', 'Upload', Student];

 	function Student($http, Upload){

		var Student = this;
		var endpoint = '';

		Student.get = function(){
			return $http.get(endpoint + '/api/routes.php/student');
		};

		Student.getProfile = function(userOrMail){
			return $http.get(endpoint + '/api/routes.php/student/getByUserOrMail/' + userOrMail);
		}

		Student.post = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/api/routes.php/student',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		Student.update = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/api/routes.php/student',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		Student.destroy = function(user_id){
			return $http({
				method: 'POST',
				url: endpoint + '/api/routes.php/student/',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
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