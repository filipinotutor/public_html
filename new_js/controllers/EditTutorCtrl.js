'use strict';

var $inject =  ['$scope', '$rootScope', '$stateParams', '$state', '$q', 'TutorSess', 
		'Tutor', 'User', 'ConstantSess', 'Supervisor', '$timeout', '$location', 
		EditTutorCtrl];


	function EditTutorCtrl($scope, $rootScope, $stateParams, $state, $q, TutorSess, 
				Tutor, User, ConstantSess, Supervisor, $timeout, $location) {

		$scope.isReady = false;
		$scope.input = {};

		var tutorUserOrMail = $stateParams.userNameOrEmail;

		$scope.uploadPic = function(file) {

			Tutor.uploadImage(file, $scope.tutor.tutor_id, $scope.tutor.photo)
				.then(function (response) {
			      $timeout(function () {
			        
			        var new_path = response.data.new_path;
			        file.result = response.data;
			        $scope.tutor.photo = new_path;
			        TutorSess.putProfileData($scope.tutor.tutor_id, $scope.tutor);
			        $scope.picFile1 = null;
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

		$scope.uploadAudio = function(file) {

			Tutor.uploadAudio(file, $scope.tutor.tutor_id, $scope.tutor.audio)
				.then(function (response) {
			      $timeout(function () {
			        
			        var new_path = response.data.new_path;
			        $scope.tutor.audio = new_path;
			        TutorSess.putProfileData($scope.tutor.tutor_id, $scope.tutor);

			        // file.result = response.data;
			        // $scope.picFile1 = null;
			        // $scope.uploadCancel = false;
			        // $scope.uploadSave = false;
			        // console.log(JSON.stringify(response.data.new_path));
			        // console.log(JSON.stringify('TUTOR: ' + $scope.tutor));

			      });
			    }, function (response) {
			      if (response.status > 0)
			        $scope.errorMsg = response.status + ': ' + response.data;

			    	console.log(JSON.stringify(response));

			    }, function (evt) {

			      // Math.min is to fix IE which reports 200% sometimes
			      file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));

			      console.log(JSON.stringify(evt));

			      // console.log('percentage: ' + file.progress);

			    });
		}

		$scope.validate = function(error){
			
			// var errormsg = error.$errorMessages.maxSize;

			if(error[0]) {
				// error in uploading
			} else {
				// no error
			}

			// if(typeof error[0].$errorMessages.maxSize != undefined) {
			// 	console.log('1');
			// }
		}

		function initData() {

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

			$scope.tutor = TutorSess.getProfileData(tutorUserOrMail);

			if(!$scope.tutor) {
				Tutor.getProfile(tutorUserOrMail)
					.then(function(data){
						$scope.tutor = data;
						$scope.tutor.birthday = moment().format('MMM DD YYYY');
						TutorSess.putProfileData($scope.tutor.tutor_id, data);
						$scope.isReady = true;	
					});
			} else {
				$scope.tutor.birthday = moment().format('MMM DD YYYY');
				$scope.isReady = true;	
			}
		}

		$scope.deactivate = function(tutor_id){

			User.deactivate({user_id: tutor_id, deactivator_id: $rootScope.userData.user_id})
				.then(function(data){
					var data = data.data;
					console.log(JSON.stringify(data));
				});
		}

		$scope.saveEdit = function() {

			var copy = TutorSess.getProfileData(tutorUserOrMail);
			var user_fields = User.fields();
			var tutor_fields = Tutor.fields();
			var userData = {};
			var tutorData = {};
			var hasUserData = false;
			var hasTutorData = false;
			var isUpdated = false;

			angular.forEach($scope.tutor, function(value, key) {
				if(!(value == copy[key])){
					if(!angular.isUndefined(user_fields[key])){
						user_fields[key] = value;
					} else if(!angular.isUndefined(tutor_fields[key])){
						tutor_fields[key] = value;
					}
				}
			});


			angular.forEach(user_fields, function(value, key){
				if(!(value == '')) {
					userData[key] = value;
					hasUserData = true;
				}
			});

			angular.forEach(tutor_fields, function(value, key){
				if(!(value == '')) {
					tutorData[key] = value;
					hasTutorData = true;
				}
			});


			// console.log(JSON.stringify(userData));
			// console.log(JSON.stringify(tutorData))

			if(hasUserData && hasTutorData){
				var curr_login_id = $rootScope.userData.user_id;
				var curr_datetime = moment().format('YYYY-MM-DD HH:mm:ss');

				userData.user_id = $scope.tutor.user_id;
				userData.last_update_id = curr_login_id;
				userData.last_update = curr_datetime;
				
				tutorData.tutor_id = $scope.tutor.tutor_id;
				tutorData.last_update_id = curr_login_id
				tutorData.last_update = curr_datetime;

				$q.all([User.update(userData), Tutor.update(tutorData)])
					.then(function(data){

						var user = data[0].success;
						var tutor = data[1].success;

						TutorSess.putProfileData($scope.tutor.tutor_id, $scope.tutor);
						isUpdated = true;
						$location.path('tutor/'+$scope.tutor.username+'/edit/profile');


						alert('DATA SAVED');

					}, function(err){
						console.log('err: ' + JSON.stringify(err));
					});


			} else if(hasUserData) {
				userData.user_id = $scope.tutor.user_id;
				userData.last_update_id = $rootScope.userData.user_id;
				userData.last_update = moment().format('YYYY-MM-DD HH:mm:ss');

				User.update(userData)
					.then(function(data){
						
						TutorSess.putProfileData($scope.tutor.tutor_id, $scope.tutor);
						isUpdated = true;
						$location.path('tutor/'+$scope.tutor.username+'/edit/profile');

						alert('DATA SAVED');

					}, function(err){	
						console.log(JSON.stringify(err));
					});

			} else if(hasTutorData) {
				tutorData.tutor_id = $scope.tutor.tutor_id;
				tutorData.last_update_id = $rootScope.userData.user_id;
				tutorData.last_update = moment().format('YYYY-MM-DD HH:mm:ss');

				Tutor.update(tutorData)
					.then(function(data){

						TutorSess.putProfileData($scope.tutor.tutor_id, $scope.tutor);
						isUpdated = true;
						$location.path('tutor/'+$scope.tutor.username+'/edit/profile');

						alert('DATA SAVED');

					}, function(err){	
						console.log(JSON.stringify(err));
					});
			}
		}

		initData();

	}


angular.module('filTutorApp')
	.controller('EditTutorCtrl', $inject);