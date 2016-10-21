'use strict';

var $inject = ['$scope','$rootScope', '$stateParams', '$state', '$location', 'SupervisorSess', 'Supervisor' ,'User', '$timeout', SupervisorCtrl];


	function SupervisorCtrl($scope, $rootScope, $stateParams, $state, $location, SupervisorSess, Supervisor ,User, $timeout ){
		
		var supUserOrMail = $stateParams.userNameOrEmail;

		function initData() {
		
			$scope.isReady = false;

			if(angular.isUndefined(supUserOrMail)){

				$scope.supervisorlist = SupervisorSess.getSupData();

				if(!$scope.supervisorlist){
					Supervisor.get()
						.then(function(data){

							SupervisorSess.storeSupData(data);
							$scope.supervisorlist = data;
							$scope.isReady = true;
						});
				} else {
					$scope.isReady = true;
				}

			} else {

				$scope.supervisor = SupervisorSess.getProfileData(supUserOrMail);
				
				if(!$scope.supervisor) {
					Supervisor.getProfile(supUserOrMail)
						.then(function(data){
							$scope.supervisor = data;
							SupervisorSess.putProfileData($scope.supervisor.supervisor_id, data);
						});
				} else {
					$scope.isReady = true;
				}

				$scope.supervisor.disable = true;

				Supervisor.getAssignedTutors($scope.supervisor.supervisor_id)
					.then(function(data){
						$scope.tutorlist = data;
					});
			}
		}

		initData();


		$scope.editProfile = function(){

			$scope.supervisor.disable = false;
		}

		$scope.deactivate = function(supervisor_id, deactivate_status) {

			var userData = {
					user_id: supervisor_id,
					deactivator_id: $rootScope.userData.user_id
				}

				if(deactivate_status == 0) {
					User.deactivate(userData)
						.then(function(data){
							$scope.supervisor.deactivated = 1;
							SupervisorSess.putProfileData($scope.supervisor.supervisor_id, $scope.supervisor);
						});
				} else {
					User.activate(userData)
						.then(function(data){
							$scope.supervisor.deactivated = 0;
							SupervisorSess.putProfileData($scope.supervisor.supervisor_id, $scope.supervisor);
						});
				}
		}

		$scope.uploadPic = function(file) {

			Supervisor.uploadImage(file, $scope.supervisor.supervisor_id, $scope.supervisor.photo)
				.then(function (response) {
			      $timeout(function () {
			        
			        var new_path = response.data.new_path;
			        file.result = response.data;
			        $scope.supervisor.photo = new_path;
			        SupervisorSess.putProfileData($scope.supervisor.supervisor_id, $scope.supervisor);
			        $scope.picFile = null;
			        // $scope.uploadCancel = false;
			        // $scope.uploadSave = false;

			        // console.log(JSON.stringify(response.data.new_path));
			        // console.log(JSON.stringify('TUTOR: ' + $scope.tutor));

			      });
			    }, function (response) {
			      if (response.status > 0)
			        $scope.errorMsg = response.status + ': ' + response.data;
			    }, function (evt) {

			      // Math.min is to fix IE which reports 200% sometimes
			      file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));

			      console.log(JSON.stringify(evt));

			      // console.log('percentage: ' + file.progress);

			    });
		}

		$scope.saveEdit = function() {
			var copy = SupervisorSess.getProfileData(supUserOrMail);
			var user_fields = User.fields();
			var sup_fields = Supervisor.fields();
			var userData = {};
			var supData = {};

			var hasUserData = false;
			var hasSupData = false;
			var isUpdated = false;


			angular.forEach($scope.supervisor, function(value, key) {
				if(!(value == copy[key])){
					if(!angular.isUndefined(user_fields[key])){
						user_fields[key] = value;
					} else if(!angular.isUndefined(sup_fields[key])){
						sup_fields[key] = value;
					}
				}
			});

			angular.forEach(user_fields, function(value, key){
				if(!(value == '')) {
					userData[key] = value;
					hasUserData = true;
				}
			});

			angular.forEach(sup_fields, function(value, key){
				if(!(value == '')) {
					supData[key] = value;
					hasSupData = true;
				}
			});
			
			// console.log('user: ' + JSON.stringify(userData));
			// console.log('sup: ' + JSON.stringify(supData));

			if(hasUserData && hasSupData) {

			} else if(hasUserData) {
				userData.user_id = $scope.supervisor.user_id;
				userData.last_update_id = $rootScope.userData.user_id;
				userData.last_update = moment().format('YYYY-MM-DD HH:mm:ss');

				User.update(userData)
					.then(function(data){
						
						SupervisorSess.putProfileData($scope.supervisor.supervisor_id, $scope.supervisor);
						isUpdated = true;
						$scope.supervisor.disable = true;

						$location.path('supervisor/'+$scope.supervisor.username);
						alert('DATA SAVED');

					});

			} else if(hasSupData) {
				supData.supervisor_id = $scope.supervisor.supervisor_id;
				supData.last_update_id = $rootScope.userData.user_id;
				supData.last_update = moment().format('YYYY-MM-DD HH:mm:ss');

				Supervisor.update(supData)
					.then(function(data){

						SupervisorSess.putProfileData($scope.supervisor.supervisor_id, $scope.supervisor);
						isUpdated = true;
						$location.path('supervisor/'+$scope.supervisor.username);
						alert('DATA SAVED');

					});
			}

		}

	}


angular.module('filTutorApp')
	.controller('SupervisorCtrl', $inject);
