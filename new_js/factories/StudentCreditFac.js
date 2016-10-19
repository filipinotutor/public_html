'use strict';

var $inject = ['$http', '$q', StudentCredit];

 	function StudentCredit($http, $q){

		var StudentCredit = this;
		var endpoint = '/api/routes.php/studentcredit';

		StudentCredit.get = function(){
			return $http.get(endpoint);
		};

		StudentCredit.getById = function(user_id){

			var dfr = $q.defer();

			$http.get(endpoint + '/student/' + user_id)
				.then(function(data){
					var data = data.data;

					if(data[0].success) {
						dfr.resolve(data[1]);
					} else {	
						console.log('StudentCredit.get ' + JSON.stringify(data));
						dfr.reject('Error');
					}

				});

			return dfr.promise;
		}

		StudentCredit.post = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/api/routes.php/studentcredit',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		StudentCredit.update = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/api/routes.php/studentcredit',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		StudentCredit.destroy = function(user_id){
			return $http({
				method: 'POST',
				url: endpoint + '/api/routes.php/studentcredit/',
				data: userData,
				headers: {'Content-Type' : 'application/x-www-form-urlencoded'}		
			});
		}

		return StudentCredit;

	}

angular.module('filTutorApp')
	.factory('StudentCredit', $inject);