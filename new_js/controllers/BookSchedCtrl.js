'use strict';

var $inject = ['$scope','$rootScope', '$stateParams', '$state', 'Schedule', '$q', BookSchedCtrl];

	function BookSchedCtrl($scope, $rootScope, $stateParams, $state, Schedule, $q){

		var deferred = $q.defer();

		// $q.all([Schedule.get1(), Schedule.get2()])
		// 	.then(function(data){
		// 		console.log(JSON.stringify(data));
		// 	}, function(err){	
		// 		console.log(JSON.stringify('error' + err));
		// 	});


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


angular.module('filTutorApp')
	.controller('BookSchedCtrl', $inject);