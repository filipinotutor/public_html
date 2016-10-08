'use strict';

angular.module('filTutorApp')
	.factory('Applicant', ['$http', function($http){

		var Applicant = this;
		var endpoint = '/api/routes.php/applicant';
		var headers =  {'Content-Type' : 'application/x-www-form-urlencoded'};


		Applicant.get = function(){
			return $http.get(endpoint);
		};

		
		Applicant.deactivate = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/user/deactivate',
				data: userData,
				headers: headers
			});
		}

		Applicant.activate = function(userData){
			alert(JSON.stringify(userData));
			return $http({
				method: 'POST',
				url: endpoint + '/user/activate',
				data: userData,
				headers: headers
			});
		}


		Applicant.post = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/user',
				data: userData,
				headers: headers
			});
		}


		Applicant.update = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/user',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		Applicant.destroy = function(user_id){
			return $http({
				method: 'POST',
				url: endpoint + '/user/',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		return Applicant;

	}]);