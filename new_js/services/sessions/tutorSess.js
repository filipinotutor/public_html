'use strict';

var $inject ['CacheFactory', 'Tutor', TutorSess];

angular.module('filTutorApp')
	.service('TutorSess', $inject);

	function TutorSess(){
		
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

	}