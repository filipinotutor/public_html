'use strict';

var $inject = ['$scope','$rootScope', '$stateParams', '$state', '$timeout', 'StudentSess', 
			   'User', 'Student', '$location', 'StudentCredit', StudentCtrl];

	function StudentCtrl($scope, $rootScope, $stateParams, $state, $timeout, StudentSess, 
						 User, Student, $location, StudentCredit){

			$scope.isReady = false;
			$scope.studentlist = [];

			var studUserOrMail = $stateParams.userNameOrEmail;

			function initList() {
				
				$scope.newlyreglist = [];
				$scope.deactstudlist = [];

				angular.forEach($scope.studentlist, function(value, key){

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
				
				$scope.isReady = false;

				if(angular.isUndefined(studUserOrMail)){

					$scope.studentlist = StudentSess.getStudentData();

					if(!$scope.studentlist) {
						Student.get()
							.then(function(data){

								$scope.studentlist = data;		
								
								StudentSess.storeStudentData(data);

								$scope.isDataReady = true;
								initList();

							});
					} else {
						$scope.isReady = true;	
						initList();
					}
				} else {

					$scope.student = StudentSess.getProfileData(studUserOrMail);
					var stud_id = StudentSess.getStudentId(studUserOrMail);

					if(!$scope.student) {
						Student.getProfile(studUserOrMail)
							.then(function(data){
								$scope.student = data;
								$scope.student.disable = true;
							});
					} else {
						$scope.student.disable = true;
						$scope.isReady = true;	
					}

					StudentCredit.getById(stud_id)
						.then(function(data){

							$scope.esl_credit = 0;
							$scope.b_credit = 0;

							angular.forEach(data, function(value, key){
								if(value.credit_type_id == 1){
									$scope.esl_credit = $scope.esl_credit + parseInt(value.credit_value);
								} else {
									$scope.b_credit = $scope.b_credit + parseInt(value.credit_value);
								}							
							});

						}, function(err){
							console.log('StudentCredit.getById: ' + JSON.stringify(err));
						});

				}
			}

			$scope.edit = function() {

				$scope.student.disable = false;
				
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

			$scope.deactivate = function(student_id, deactivate_status){
					
				var userData = {
					user_id: student_id,
					deactivator_id: $rootScope.userData.user_id
				}

				if(deactivate_status == 0) {
					User.deactivate(userData)
						.then(function(data){

							// console.log('D1: ' + JSON.stringify(data));
							$scope.student.deactivated = 1;
						});
				} else {
					User.activate(userData)
						.then(function(data){

							// console.log('D2: ' + JSON.stringify(data));
							$scope.student.deactivated = 0;

						});
				}
			}

			$scope.saveEdit = function() {
				
				var copy = StudentSess.getProfileData(studUserOrMail)
				var user_fields = User.fields();
				var stud_fields = Student.fields();
				var userData = {};
				var studData = {};
				var hasUserData = false;
				var hasStudData = false;
				var isUpdated = false;

				angular.forEach($scope.student, function(value, key) {
					if(!(value == copy[key])){
						if(!angular.isUndefined(user_fields[key])){
							user_fields[key] = value;
						} else if(!angular.isUndefined(stud_fields[key])){
							stud_fields[key] = value;
						}
					}
				});

				angular.forEach(user_fields, function(value, key){
					if(!(value == '')) {
						userData[key] = value;
						hasUserData = true;
					}
				});

				angular.forEach(stud_fields, function(value, key){
					if(!(value == '')) {
						studData[key] = value;
						hasStudData = true;
					}
				});

				// console.log('A1: ' + JSON.stringify(userData));
				// console.log('A1: ' + JSON.stringify(studData));
				// console.log('A1: ' + JSON.stringify(userData));

				if(hasUserData && hasStudData) {
					var curr_login_id = $rootScope.userData.user_id;
					var curr_datetime = moment().format('YYYY-MM-DD HH:mm:ss');

					userData.user_id = $scope.student.user_id;
					userData.last_update_id = curr_login_id;
					userData.last_update = curr_datetime;
					
					tutorData.student_id = $scope.student.student_id;
					tutorData.last_update_id = curr_login_id
					tutorData.last_update = curr_datetime;

					$q.all([User.update(userData), Tutor.update(tutorData)])
						.then(function(data){

							var user = data[0].success;
							var student = data[1].success;

							StudentSess.putProfileData($scope.student.student_id, $scope.student);
							isUpdated = true;

							if(user && student) {
								alert('DATA SAVED');
								$location.path('student/'+$scope.student.username);
							}

						}, function(err){
							console.log('err: ' + JSON.stringify(err));
						});

				} else if(hasUserData) {

					userData.user_id = $scope.student.user_id;
					userData.last_update_id = $rootScope.userData.user_id;
					userData.last_update = moment().format('YYYY-MM-DD HH:mm:ss');

					User.update(userData)
						.then(function(data){
							
							StudentSess.putProfileData($scope.student.student_id, $scope.student);
							isUpdated = true;
							$scope.student.disable = true;

							$location.path('student/'+$scope.student.username);
							alert('DATA SAVED');

						}, function(err){	
							console.log(JSON.stringify(err));
						});

				} else if(hasStudData) {
					studData.student_id = $scope.student.student_id;
					studData.last_update_id = $rootScope.userData.user_id;
					studData.last_update = moment().format('YYYY-MM-DD HH:mm:ss');

					Student.update(studData)
						.then(function(data){

							StudentSess.putProfileData($scope.student.student_id, $scope.student);
							isUpdated = true;
							$location.path('student/'+$scope.student.username);
							alert('DATA SAVED');

						}, function(err){	
							console.log(JSON.stringify(err));
						});
				}

				$scope.student.disable = true;


			}


			$scope.uploadPic = function(file) {

				Student.uploadImage(file, $scope.student.student_id, $scope.student.photo)
					.then(function (response) {
				      $timeout(function () {
				        
				        var new_path = response.data.new_path;
				        file.result = response.data;
				        $scope.student.photo = new_path;
				        StudentSess.putProfileData($scope.student.student_id, $scope.student);
				        $scope.picFile1 = null;

				        console.log('RES: ' + JSON.stringify(response.data));

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



			initData();
		}

angular.module('filTutorApp')
	.controller('StudentCtrl', $inject);