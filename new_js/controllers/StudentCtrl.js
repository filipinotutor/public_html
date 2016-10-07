'use strict';

angular.module('filTutorApp')
	.controller('StudentCtrl', ['$scope','$rootScope', '$stateParams', '$state', 'StudentSess', 'Student'
		, function($scope, $rootScope, $stateParams, $state, StudentSess, Student){

			$scope.isReady = false;
			$scope.studentlist = [];

			function initList() {
				
				$scope.newlyreglist = [];
				$scope.deactstudlist = [];

				angular.forEach($scope.studentlist, function(value, key){
					// .format('YYYY-MM-DD HH:mm:ss')
					// var oneMo = moment(registered_date).isBefore(moment(moment().add(30, 'days'));
					// console.log('re: ' + registered_date);
					// console.log('30D: ' + moment().add(30, 'days'));
					// console.log('onmo:' + oneMo);

					var registered_date = moment(value.creation_date).format('YYYY-MM-DD HH:mm:ss');
					var oneMo = moment().subtract(30, 'days').format('YYYY-MM-DD HH:mm:ss');
					var isBefore = moment(registered_date).isBefore(oneMo);
	
					if(value.deactivated == 1) {
						$scope.deactstudlist.push(value);
					}

					if(!isBefore) {
						$scope.newlyreglist.push(value);
					}

				});

				$scope.deactStudCount = $scope.deactstudlist.length;
				$scope.newRegCount = $scope.newlyreglist.length;
				$scope.studCount = $scope.studentlist.length;
			}

			function initData() {

				var studUserOrMail = $stateParams.userNameOrEmail;
				$scope.isReady = false;

				if(angular.isUndefined(studUserOrMail)){
					$scope.studentlist = StudentSess.getStudentData();

					if($scope.studentlist.length == 0) {
						Student.get()
							.then(function(data){
								var data = data.data;

								StudentSess.storeStudentData(data[1]);		
								$scope.studentlist = data[1];					
								$scope.isDataReady = true;
								initList();
							});
					} else {
						$scope.isReady = true;	
						initList();
					}
				} else {
					$scope.student = "";
					
					// if($scope.tutor.length == 0) {
					Student.getProfile(studUserOrMail)
						.then(function(data){
							var data = data.data;

							$scope.student = data[1][0];

							console.log(JSON.stringify($scope.student));

						});
					// } else {
					// 	$scope.isReady = true;
					// }
				}

			}

			$scope.deactStudent = function() {
				initData();
				initList();
				$scope.studentlist = $scope.deactstudlist;
			}

			$scope.newlyRegister = function() {
				initData();
				initList();
				$scope.studentlist = $scope.newlyreglist;
			}

			$scope.allStudent = function() {
				initData();
			}			


			initData();
		}

	]);


