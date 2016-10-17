'use strict';


var $inject = ['$scope','$rootScope', '$stateParams', '$state', '$q', 'TutorSess', 'Tutor', 'User', 'CHistorySess', TutorCtrl];


	function TutorCtrl($scope, $rootScope, $stateParams, $state, $q, TutorSess, Tutor, User, CHistorySess){

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
				var oneMo = moment().subtract(30, 'days').format('YYYY-MM-DD HH:mm:ss');
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
			// $scope.tutorCount = 0;
			// $scope.newRegCount = 0;
			// $scope.deactTutorCount = 0;
			// $scope.forAppListCount = 0;
		}

		function initData() {

			var tutorUserOrMail = $stateParams.userNameOrEmail;
			
			if(angular.isUndefined(tutorUserOrMail)){
				
				$scope.tutorlist = TutorSess.getTutorData();
				
				if(!$scope.tutorlist) {
					Tutor.get()
						.then(function(data){
							TutorSess.storeTutorData(data);		
							$scope.tutorlist = data;					
							$scope.isReady = true;
							initList();
						});
				} else {
					$scope.isReady = true;	
					initList();
				}

			} else {
				$scope.tutor = TutorSess.getProfileData(tutorUserOrMail);
				$scope.isReady = false;
				if(!$scope.tutor) {
					Tutor.getProfile(tutorUserOrMail)
						.then(function(data){
							$scope.tutor = data;
							TutorSess.putProfileData(tutorUserOrMail, data);
							$scope.isReady = true;	
						});
				} else {
					$scope.isReady = true;
				}
			}
		}

		$scope.deactivate = function(tutor_id){

			User.deactivate({user_id: tutor_id, deactivator_id: $rootScope.userData.user_id})
				.then(function(data){
					var data = data.data;
					if(data.success) {
						$scope.tutor.deactivated = 1;
					}
				});
		}

		$scope.activate = function(tutor_id){
			User.activate({ user_id: tutor_id, deactivator_id: $rootScope.userData.user_id })
				.then(function(data){
					var data = data.data;
					if(data.success) {
						$scope.tutor.deactivated = 0;
					}
				});
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



angular.module('filTutorApp')
	.controller('TutorCtrl', $inject);