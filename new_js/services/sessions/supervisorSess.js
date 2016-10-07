'use strict';

angular.module('filTutorApp')
	.service('SupervisorSess', [ function(){
		
		var data = {};

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