'use strict';

angular.module('filTutorApp')
	.service('TutorSess', [ function(){
		
		var data = [];

		function getTutorData() {
			return data;
		}

		function storeTutorData(obj) {
			data = obj;
		}

		return {
			getTutorData: getTutorData,
			storeTutorData: storeTutorData
		}

	}]);