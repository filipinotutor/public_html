'use strict';

angular.module('filTutorApp')
	.controller('EditTutorCtrl', ['$scope','$rootScope', '$stateParams', '$state', '$q', 'TutorSess', 'Tutor', 'User', 'ConstantSess', 
		'Supervisor', '$timeout'
		, function($scope, $rootScope, $stateParams, $state, $q, TutorSess, Tutor, User, ConstantSess, Supervisor, $timeout){

			$scope.isReady = false;
			$scope.tutorlist = [];

			$scope.uploadPic = function(file) {
				Tutor.uploadImage(file, 123)
					.then(function (response) {
				      $timeout(function () {
				        file.result = response.data;
				      });
				    }, function (response) {
				      if (response.status > 0)
				        $scope.errorMsg = response.status + ': ' + response.data;
				    }, function (evt) {
				      // Math.min is to fix IE which reports 200% sometimes
				      file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
				    });
			}

			function initData() {

				var tutorUserOrMail = $stateParams.userNameOrEmail;
				$scope.isReady = false;

				$scope.tutor_types = ConstantSess.getConstant('tutor_type');
				$scope.banks = ConstantSess.getConstant('bank');
				$scope.teaching_exp = ConstantSess.getConstant('teaching_exp');

				if(ConstantSess.getConstant('supervisor').length == 0) {
					Supervisor.list()
						.then(function(data){
							$scope.supervisors = data;
							$scope.isReady = true;
							ConstantSess.storeConstant('supervisor', data);
						});
				} else {
					$scope.supervisors =  ConstantSess.getConstant('supervisor');
					$scope.isReady = true;
				}

				$scope.educ_level = ConstantSess.getConstant('educ_level');

				// $rootScope.tutor_types.forEach(function(value, key){
				// 	console.log(JSON.stringify(value));
				// });	

				// if(angular.isUndefined(tutorUserOrMail)){
				// 	$scope.tutorlist = TutorSess.getTutorData();

				// 	if($scope.tutorlist.length == 0) {
				// 		Tutor.get()
				// 			.then(function(data){
				// 				var data = data.data;
				// 				TutorSess.storeTutorData(data[1]);		
				// 				$scope.tutorlist = data[1];					
				// 				$scope.isReady = true;
				// 				initList();
				// 			});
				// 	} else {
				// 		$scope.isReady = true;	
				// 		initList();
				// 	}
				// } else {

					$scope.tutor = "";
					
					// if($scope.tutor.length == 0) {
					Tutor.getProfile(tutorUserOrMail)
						.then(function(data){
							var data = data.data;

							$scope.tutor = data[1][0];

							// TutorSess.storeTutorProf(data[1][0]);
							// $scope.tutor = TutorSess.getTutorProf();
						});
				// }
			}

			$scope.deactivate = function(tutor_id){

				User.deactivate({user_id: tutor_id, deactivator_id: $rootScope.userData.user_id})
					.then(function(data){
						var data = data.data;
						console.log(JSON.stringify(data));
					});
			}

			$scope.saveEdit = function() {
				console.log('Tutor: ' + JSON.stringify($scope.tutor));
			}


			initData();



		}

	]);


