'use strict';

angular.module('filTutorApp')
	.controller('SupervisorCtrl', ['$scope','$rootScope', '$stateParams', '$state', 'SupervisorSess', 'Supervisor'
		, function($scope, $rootScope, $stateParams, $state, SupervisorSess, Supervisor){

			function initData() {

				var supUserOrMail = $stateParams.userNameOrEmail;
				$scope.isReady = false;

				if(angular.isUndefined(supUserOrMail)){
					Supervisor.get()
						.then(function(data){

							SupervisorSess.storeSupData(data);
						
						});
				} else {
					Supervisor.getProfile(supUserOrMail)
						.then(function(data){

							$scope.supervisor = data;
							
						});
				}

				
			}

			initData();
			
		}
	]);


