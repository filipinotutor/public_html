'use strict';

angular.module('filTutorApp')
	.service('TutorSess', [ function(){
		
		var data = [];
		var tutorData = [];

		function getTutorData() {
			return data;
		}

		function getTutorProf(){
			return tutorData;
		}

		function storeTutorData(obj) {
			data = obj;
		}

		function storeTutorProf(obj) {
			tutorData = obj;
		}

		return {
			getTutorData: getTutorData,
			storeTutorData: storeTutorData,
			getTutorProf: getTutorProf,
			storeTutorProf: storeTutorProf
		}

	}]);