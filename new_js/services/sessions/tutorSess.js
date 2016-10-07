'use strict';

angular.module('filTutorApp')
	.service('TutorSess', [ function(){
		
		var data = [];
		data.tutorData = [];
		data.tutorProf = null;

		function getTutorData() {
			return data.tutorData;
		}

		// function getTutorProf(){
		// 	return data.tutorData;
		// }

		function storeTutorData(obj) {
			data.tutorData = obj;
		}

		// function storeTutorProf(obj) {
		// 	data.tutorProf = obj;
		// }

		return {
			getTutorData: getTutorData,
			storeTutorData: storeTutorData
			// getTutorProf: getTutorProf,
			// storeTutorProf: storeTutorProf
		}

	}]);