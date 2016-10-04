'use strict';

angular.module('filTutorApp')
	.service('StudentSess', [ function(){
		
		var data = [];

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