'use strict';

angular.module('filTutorApp')
	.controller('SupervisorCtrl', ['$scope','$rootScope', '$stateParams', '$state', 'SupervisorSess', 'Supervisor'
		, function($scope, $rootScope, $stateParams, $state, SupervisorSess, Supervisor){

			function initData() {
				Supervisor.get()
					.then(function(data){
						var data = data.data;
						
						// console.log(data[0].success);
						$scope.supervisorlist = data[1];

					});
			}

			initData();
			
		}
	]);


