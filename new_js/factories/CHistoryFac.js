'use strict';

angular.module('filTutorApp')
	.factory('CHistory', ['$http', function($http){

		var CHistory = this;
		var endpoint = '/api/routes.php/classhistory';
		var headers =  {'Content-Type' : 'application/x-www-form-urlencoded'};

		CHistory.get = function(){
			return $http.get(endpoint);
		};
		
		// Admin.post = function(userData){
		// 	return $http({
		// 		method: 'POST',
		// 		url: endpoint + '/user',
		// 		data: userData,
		// 		headers: headers
		// 	});
		// }

		return CHistory;

	}]);