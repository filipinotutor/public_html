'use strict';

angular.module('filTutorApp')
	.service('StudentSess', [ 'CacheFactory',  function(CacheFactory){
		
		var data = [];

		var studentProfileCache = CacheFactory('studentProfileCache', {
				maxAge: 60 * 60 * 1000, // 1 hour,
				deleteOnExpire: 'aggressive',
				storageMode: 'sessionStorage',
				onExpire: function() {
					Student.get()
						.then(function(data){
							profileCache.put('student_profiles', data);
						});
				}
			});

		function getStudentData() {
			return data;
		}

		function storeStudentData(obj) {
			data = obj;
		}

		return {
			getStudentData: getStudentData,
			storeStudentData: storeStudentData
		}

	}]);