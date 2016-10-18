'use strict';

var $inject = ['$http', 'Upload', '$q' , Student];

 	function Student($http, Upload, $q){

		var Student = this;
		var endpoint = '/api/routes.php/student';
		var header = {'Content-Type' : 'application/x-www-form-urlencoded'};

		Student.get = function(){
			return $http.get(endpoint);
		};

		Student.getProfile = function(userOrMail){

			var dfr = $q.defer();

			$http.get(endpoint + '/getByUserOrMail/' + userOrMail)
				.then(function(data){
					var data = data.data;

					if(data[0].success){
						dfr.resolve(data[1][0]);
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

		Student.post = function(userData){
			return $http({
				method: 'POST',
				url: endpoint, 
				data: userData,
				headers: header
			});
		}

		Student.update = function(userData){
			return $http({
				method: 'POST',
				url: endpoint, 
				data: userData,
				headers: header
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