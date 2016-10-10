'use strict';

angular.module('filTutorApp')
	.service('CHistorySess', [ function(){
		
		var data = [];
		var CHUserId = 0;

		function getCHistoryData() {
			return data;
		}

		function storeCHistoryData(obj) {
			data = obj;
		}

		function getCHUserId() {
			return CHUserId;
		}

		function storeCHUserId(user_id){
			CHUserId = user_id;
		}

		return {
			getCHistoryData: getCHistoryData,
			storeCHistoryData: storeCHistoryData,
			getCHUserId:  getCHUserId,
			storeCHUserId: storeCHUserId
		}

	}]);