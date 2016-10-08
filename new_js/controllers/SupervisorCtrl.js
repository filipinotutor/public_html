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
							var data = data.data;
							
							if(data[0].success){
								$scope.supervisorlist = data[1];
								SupervisorSess.storeSupData(data[1]);
							}

						});
				} else {
					Supervisor.getProfile(supUserOrMail)
						.then(function(data){
							var data = data.data;

							$scope.supervisor = data[1][0];
							
						});
				}

				
			}

			initData();
			
		}
	]);


