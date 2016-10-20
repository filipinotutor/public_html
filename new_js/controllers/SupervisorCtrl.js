'use strict';

var $inject = ['$scope','$rootScope', '$stateParams', '$state', 'SupervisorSess', 'Supervisor', SupervisorCtrl];


	function SupervisorCtrl($scope, $rootScope, $stateParams, $state, SupervisorSess, Supervisor){
		
		function initData() {
			var supUserOrMail = $stateParams.userNameOrEmail;
			$scope.isReady = false;

			if(angular.isUndefined(supUserOrMail)){

				$scope.supervisorlist = SupervisorSess.getSupData();

				if(!$scope.supervisorlist){
					Supervisor.get()
						.then(function(data){

							SupervisorSess.storeSupData(data);
							$scope.supervisorlist = data;
							$scope.isReady = true;
						});
				} else {
					$scope.isReady = true;
				}

			} else {

				$scope.supervisor = SupervisorSess.getProfileData(supUserOrMail);
				
				if(!$scope.supervisor) {
					Supervisor.getProfile(supUserOrMail)
						.then(function(data){
							$scope.supervisor = data;
							SupervisorSess.putProfileData($scope.supervisor.supervisor_id, data);
						});
				} else {
					$scope.isReady = true;
				}
							

				// Supervisor.getAssignedTutors($scope.supervisor.supervisor_id)
				// 	.then(function(data){

				// 		$scope.tutorlist = 
					
				// 	});

				
			}

		
		}

		initData();
	}


angular.module('filTutorApp')
	.controller('SupervisorCtrl', $inject);
