'use strict';

angular.module('filTutorApp')
	.controller('DashboardCtrl', ['$scope', '$rootScope', 'api', 'session', function($scope, $rootScope, api, session){
		
		var vm = this;
		// vm.isReady = false;

		$scope.submit = function () {
			
			var data = {
				fname: 'Jayson',
				lname: 'Vacaro'
			};

			alert('uD: ' + JSON.stringify($rootScope.userData));

			// api.postUserData(data)
			// 	.then(function(data){
			// 		console.log('ASDF: ' + JSON.stringify(data));
			// 	});

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


		
	}]);

