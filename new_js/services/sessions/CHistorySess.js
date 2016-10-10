'use strict';

angular.module('filTutorApp')
	.service('CHistorySess', [ function(){
		
		var data = [];

		function getCHistoryData() {
			return data;
		}

		function storeCHistoryData(obj) {
			data = obj;
		}

		return {
			getCHistoryData: getCHistoryData,
			storeCHistoryData: storeCHistoryData
		}

	}]);