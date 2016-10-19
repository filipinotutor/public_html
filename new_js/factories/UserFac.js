'use strict';

var $inject = ['$http', '$q', User];

	function User($http, $q) {

		var User = this;
		var endpoint = '/api/routes.php/user';
		var headers =  {'Content-Type' : 'application/x-www-form-urlencoded'};

		var fields = { 
						'user_id': '',
						'username': '',
						'first_name': '', 
						'last_name': '',
						'email': '',
						'gender': '',
						'skype_id': '',
						'last_update_id': ''
					 };

		User.fields = function() {

			angular.forEach(fields, function(value, key){
				fields[key] = '';
			});

			return fields;
		}
		
		User.get = function(){
			return $http.get(endpoint);
		};

		User.getLoggedInUser = function(){
			return $http.get(endpoint + '/loggedin');
		};

		User.deactivate = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/deactivate',
				data: userData,
				headers: headers
			});
		}

		User.activate = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/activate',
				data: userData,
				headers: headers
			});
		}

		User.changePw = function(userData){
			return $http({
				method: 'POST',
				url: endpoint + '/changepw',
				data: userData,
				headers: headers
			});
		}

		User.update = function(userData){
			
			var deferred = $q.defer();

			$http({
				method: 'POST',
				url: endpoint + '/update',
				data: userData,
				headers: headers	
			})
			.then(function(data){
				
				var data = data.data;

				if(data.success) {
					deferred.resolve(data);
				} else {
					console.log('UserFac.update: ' + JSON.stringify(data));
					deferred.reject('error')
				}

			}, function(err){
				deferred.reject('error' + JSON.stringify(err));
			});
		
			return deferred.promise;
		}

		User.destroy = function(user_id){
			return $http({
				method: 'POST',
				url: endpoint + '/user/',
				data: userData,
				headers: headers
			});
		}

		return User;

	};

angular.module('filTutorApp')
	.factory('User', $inject);