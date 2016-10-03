'use strict';

angular.module('filTutorApp')
	.controller('StudentCtrl', ['$scope','$rootScope', '$stateParams', '$state', 'StudentSess', 'Student'
		, function($scope, $rootScope, $stateParams, $state, StudentSess, Student){

			function initData() {
				Student.get()
					.then(function(data){
						var data = data.data;

						// console.log(data[0].success);
						$scope.studentlist = data[1];
					});
			}

			initData();
			
		}
	]);


