'use strict';

angular.module('filTutorApp')
	.service('StudentSess', [ 'CacheFactory',  function(CacheFactory){
		
		var data = [];
		data.studentData = [];

		var studentCache = CacheFactory('studentCache', {
				maxAge: 60 * 60 * 1000, // 1 hour,
				// deleteOnExpire: 'aggressive',
				storageMode: 'sessionStorage'
				// onExpire: function() {
				// 	Student.get()
				// 		.then(function(data){
				// 			profileCache.put('student_profiles', data);
				// 		});
				// }
			});

		function getStudentData() {
			
			data.studentData = studentCache.get('student_profiles');
			
			return data.studentData;
		}

		function getStudentId(userNameOrEmail) {

			var student_id = '';

			angular.forEach(getStudentData(), function(value, key){
				if(userNameOrEmail == value['username'] || userNameOrEmail == value['email']) {
					student_id = value['student_id'];
				}
			});

			return student_id;
		}

		function updateSpecStudentData(student_id, obj){

			var studentData_tmp = getStudentData();

			for(var i = 0; i < studentData_tmp.length; i++){
				if(studentData_tmp.student_id == student_id) {
					studentData_tmp[i] = obj;
				}
			}
		}

		function storeStudentData(obj) {
			
			studentCache.remove('student_profiles');
			studentCache.put('student_profiles', obj);
		}

		function putProfileData(stud_id, obj){
			
			studentCache.remove(stud_id);
			studentCache.put(stud_id, obj);
			
			updateSpecStudentData(stud_id, obj);
		}

		function getProfileData(userNameOrEmail){
			
			var stud_id = getStudentId(userNameOrEmail);
			var stud_prof_data = studentCache.get(stud_id);
			
			return stud_prof_data;			
		}


		return {
			getStudentData: getStudentData,
			storeStudentData: storeStudentData,
			putProfileData:  putProfileData,
			getProfileData: getProfileData,
			getStudentId: getStudentId
		}

	}]);