'use strict';

angular.module('filTutorApp')
	.service('ApplicantSess', [ function(){
		
		var data = [];

		function getApplicantData() {
			return data;
		}

		function storeApplicantData(obj) {
			data = obj;
		}

		return {
			getApplicantData: getApplicantData,
			storeApplicantData: storeApplicantData
		}

	}]);