'use strict';

var $inject = ['$scope','$rootScope', '$stateParams', '$state', 'SupervisorSess', 'Supervisor', SupervisorCtrl];


	function($scope, $rootScope, $stateParams, $state, SupervisorSess, Supervisor){
		
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


angular.module('filTutorApp')
	.controller('SupervisorCtrl', $inject);
