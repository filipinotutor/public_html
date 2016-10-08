'use strict';

angular.module('filTutorApp')
	.controller('MenuCtrl', [
		'$scope',
		'$rootScope', 
		'$timeout',
		'UserSess', 
		'User',
		'ConstantSess', 
		function($scope, $rootScope, $timeout, UserSess, User, ConstantSess){
			
			$rootScope.tutor_types = ConstantSess.getConstant('tutor_type');
			$rootScope.teaching_exp = ConstantSess.getConstant('teaching_exp');
			$rootScope.educ_level = ConstantSess.getConstant('educ_level');

			

			angular.forEach($rootScope.tutor_types, function(val, key){

			});


			var vm = this;
			// vm.isReady = false;
			vm.userData = UserSess.getUserData();

			function displayData() {
				$scope.fname = vm.userData.first_name;
				$scope.lname = vm.userData.last_name;
			}

			function initData() {
				// if(vm.userData == null) {
					User.getLoggedInUser()
						.then(function(data){
							var data = data.data;

							// data[1][0] - 1 json object
							// data[1] - array of json good for ng-repeat

							if(data[0].success) {
								var udata = data[1][0];
								UserSess.storeUserData(udata);
								vm.userData = udata;

								$rootScope.userData = udata;

								displayData();
							}
						});
				// } else {
				// 	displayData();
				// }
				

				// if(session.getUserData() == null) {
				// 	api.getUserData()
				// 		.then(function(data){
				// 			var data = data.data;
				// 				if(data[0].success) {
				// 					var data = data[1];
				// 					session.storeUserData(data);
				// 					vm.data = session.getUserData();
				// 					$scope.admin_id = vm.data.user_id;
				// 					$scope.fname = vm.data.first_name;
				// 					$scope.lname = vm.data.last_name;
				// 				}
				// 		}, function(data){
				// 			console.log("err: " + JSON.stringify(data));
				// 		});
				// }
			}

			initData();


			$scope.phTime = ""; // initialise the time variable
		    $scope.tickInterval = 1000 //ms

		    var tick = function () {
		        $scope.phTime = Date.now() // get the current time
		        $timeout(tick, $scope.tickInterval); // reset the timer
		    }

		    // Start the timer
		    $timeout(tick, $scope.tickInterval);

		}
	]);

