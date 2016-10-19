'use strict';

angular.module('filTutorApp')
	.service('SupervisorSess', ['CacheFactory', function(CacheFactory){
		
		var data = {};

		var supervisorCache = CacheFactory('supervisorCache', {
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

		function getSupData() {
			return data;
		}

		function storeSupData(obj) {
			data = obj;
		}

		return {
			getSupData: getSupData,
			storeSupData: storeSupData
		}

	}]);