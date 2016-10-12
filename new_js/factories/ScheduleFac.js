'use strict';

angular.module('filTutorApp')
	.factory('Schedule', ['$http', function($http){

		var  Schedule = this;
		var endpoint = '/api/routes.php/schedule';
		var headers =  {'Content-Type' : 'application/x-www-form-urlencoded'};


		Schedule.get = function(){
			return $http.get(endpoint);
		};
		
		Schedule.getUserSchedule = function(user_id){
			return $http.get(endpoint + '/user/' + user_id);
		};

		Schedule.add = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/add',
				data: userData,
				headers: headers
			});
		}

		Schedule.update = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/update',
				data: userData,
				headers: headers
			});
		}

		Schedule.delete = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/delete',
				data: userData,
				headers: headers
			});
		}


		return Schedule;

	}]);