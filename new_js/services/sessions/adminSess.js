'use strict';

angular.module('filTutorApp')
	.service('AdminSess', [ function(){
		
		var data = [];

		function getAdminData() {
			return data;
		}

		function storeAdminData(obj) {
			data = obj;
		}

		return {
			getAdminData: getAdminData,
			storeAdminData: storeAdminData
		}

	}]);