'use strict';

angular.module('filTutorApp')
	.controller('TutorCtrl', ['$scope','$rootScope', '$stateParams', '$state', 'TutorSess', 'Tutor'
		, function($scope, $rootScope, $stateParams, $state, TutorSess, Tutor){

			$scope.isReady = false;
			$scope.tutorlist = [];

			function initList() {
				
				$scope.newlyreglist = [];
				$scope.deacttutorlist = [];
				$scope.forapplist = [];

				angular.forEach($scope.tutorlist, function(value, key){
					// .format('YYYY-MM-DD HH:mm:ss')
					// var oneMo = moment(registered_date).isBefore(moment(moment().add(30, 'days'));
					// console.log('re: ' + registered_date);
					// console.log('30D: ' + moment().add(30, 'days'));
					// console.log('onmo:' + oneMo);

					var registered_date = moment(value.creation_date).format('YYYY-MM-DD HH:mm:ss');
					var oneMo = moment().add(30, 'days').format('YYYY-MM-DD HH:mm:ss');
					var isBefore = moment(registered_date).isBefore(oneMo);
	
					if(value.deactivated == 1) {
						$scope.deacttutorlist.push(value);
					}

					if(!isBefore) {
						$scope.newlyreglist.push(value);
					}

					if(value.access == 0) {
						$scope.forapplist.push(value);
					}

				});

				$scope.tutorCount = $scope.tutorlist.length;
				$scope.newRegCount = $scope.newlyreglist.length;
				$scope.deactTutorCount = $scope.deacttutorlist.length;
				$scope.forAppListCount = $scope.forapplist.length;
			}

			function initData() {

				$scope.tutorlist = TutorSess.getTutorData();

				if($scope.tutorlist.length == 0) {
					Tutor.get()
						.then(function(data){
							var data = data.data;
							TutorSess.storeTutorData(data[1]);		
							$scope.tutorlist = data[1];					
							$scope.isDataReady = true;
							initList();
						});
				} else {
					$scope.isReady = true;	
					initList();
				}

			}


			$scope.allTutor = function() {
				initData();
			}			

			$scope.newlyRegister = function() {
				initData();
				initList();
				$scope.tutorlist = $scope.newlyreglist
			}

			$scope.deactTutor = function() {
				initData();
				initList();
				$scope.tutorlist = $scope.deacttutorlist;
			}

			$scope.forApproval = function() {
				initData();
				initList();
				$scope.tutorlist = $scope.forapplist;
			}



			initData();
		}

	]);


