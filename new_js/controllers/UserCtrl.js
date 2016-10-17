'use strict';

var $inject = ['$scope','$rootScope', 'UserSess', 'User', UserCtrl];

	function($scope, $rootScope, UserSess, User){

		$scope.changePw = function() {
			
			var userData = {
				user_id: $rootScope.userData.user_id, 
				oldpw: $scope.oldPw, 
				newpw: $scope.newPw
			}

			User.changePw(userData)
				.then(function(data){

					var data = data.data;

					if(data.success) {
						// change password successfully
						// alert('changesuccessfully');
					} else {
						// error found on updating password
						console.log(JSON.stringify(data))
					}

				});
		}

	}


angular.module('filTutorApp')
	.controller('UserCtrl', $inject);