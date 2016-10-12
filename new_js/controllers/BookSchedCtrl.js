'use strict';

angular.module('filTutorApp')
	.controller('BookSchedCtrl', ['$scope','$rootScope', '$stateParams', '$state', 'Schedule' 
		, function($scope, $rootScope, $stateParams, $state, Schedule){


			$scope.addSchedule = function(){

				$scope.tutor.schedule_datetime =  moment($scope.date).format('YYYY-MM-DD HH:mm:ss');
				$scope.tutor.status = "open";

				// Schedule.add($scope.tutor)
				// 	.then(function(data){
				// 		var data = data.data;

				// 		alert(JSON.stringify(data));

				// 	});
			}



			Schedule.get()
				.then(function(data){
					if(data) {
						console.log('data: ' + JSON.stringify(data));
					}
				});

		}
	]);