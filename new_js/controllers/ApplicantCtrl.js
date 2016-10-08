'use strict';

angular.module('filTutorApp')
	.controller('ApplicantCtrl', ['$scope','$rootScope', '$stateParams', '$state', 'ApplicantSess', 'Applicant'
		, function($scope, $rootScope, $stateParams, $state, ApplicantSess, Applicant){

			$scope.isReady = false;
			$scope.tutorlist = [];

			function initList() {
				
				// $scope.newlyreglist = [];
				// $scope.deacttutorlist = [];
				// $scope.forapplist = [];

				// angular.forEach($scope.tutorlist, function(value, key){
				// 	// .format('YYYY-MM-DD HH:mm:ss')
				// 	// var oneMo = moment(registered_date).isBefore(moment(moment().add(30, 'days'));
				// 	// console.log('re: ' + registered_date);
				// 	// console.log('30D: ' + moment().add(30, 'days'));
				// 	// console.log('onmo:' + oneMo);

				// 	var registered_date = moment(value.creation_date).format('YYYY-MM-DD HH:mm:ss');
				// 	var oneMo = moment().subtract(30, 'days').format('YYYY-MM-DD HH:mm:ss');
				// 	var isBefore = moment(registered_date).isBefore(oneMo);
					
				// 	if(value.deactivated == 1) {
				// 		$scope.deacttutorlist.push(value);
				// 	}

				// 	if(!isBefore) {
				// 		$scope.newlyreglist.push(value);
				// 	}

				// 	if(value.access == 0) {
				// 		$scope.forapplist.push(value);
				// 	}

				// });

				// $scope.tutorCount = $scope.tutorlist.length;
				// $scope.newRegCount = $scope.newlyreglist.length;
				// $scope.deactTutorCount = $scope.deacttutorlist.length;
				// $scope.forAppListCount = $scope.forapplist.length;
			}

			function initData() {

				// var tutorUserOrMail = $stateParams.userNameOrEmail;
				// $scope.isReady = false;

				// if(angular.isUndefined(tutorUserOrMail)){
				// 	$scope.tutorlist = TutorSess.getTutorData();

				// 	if($scope.tutorlist.length == 0) {
						Applicant.get()
							.then(function(data){
								var data = data.data;
								ApplicantSess.storeApplicantData(data[1]);		
								$scope.applicantlist = data[1];					
								$scope.isReady = true;
								// initList();
							});
				// 	} else {
				// 		$scope.isReady = true;	
				// 		initList();
				// 	}
				// } else {

				// 	$scope.tutor = "";
					
				// 	// if($scope.tutor.length == 0) {
				// 	Tutor.getProfile(tutorUserOrMail)
				// 		.then(function(data){
				// 			var data = data.data;

				// 			$scope.tutor = data[1][0];

				// 			// TutorSess.storeTutorProf(data[1][0]);
				// 			// $scope.tutor = TutorSess.getTutorProf();
				// 		});
				// 	// } else {
				// 	// 	$scope.isReady = true;
				// 	// }
				// }
			}

			$scope.deactivate = function(tutor_id){

				User.deactivate({user_id: tutor_id, deactivator_id: $rootScope.userData.user_id})
					.then(function(data){
						var data = data.data;
						console.log(JSON.stringify(data));
					});
			}

			$scope.activate = function(tutor_id){
				User.activate({ user_id: tutor_id, deactivator_id: $rootScope.userData.user_id })
					.then(function(data){
						var data = data.data;
						console.log(JSON.stringify(data));
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

	]);


