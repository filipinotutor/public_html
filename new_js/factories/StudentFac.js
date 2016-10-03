'use strict';

angular.module('filTutorApp')
	.factory('Student', ['$http', function($http){

		var Student = this;
		var endpoint = '';

		Student.get = function(){
			return $http.get(endpoint + '/api/routes.php/student');
		};

		Student.getById = function(user_id){
			return $http.get(endpoint + '/api/routes.php/student/' + user_id);
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

		return Student;

	}]);