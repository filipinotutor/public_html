'use strict';

angular.module('filTutorApp')
	.service('TutorSess', [ function(){
		
		var data = {};

		function getUserData() {
			return data;
		}

		function storeUserData(obj) {
			data = obj;
		}

		return {
			getUserData: getUserData,
			storeUserData: storeUserData
		}

	}]);