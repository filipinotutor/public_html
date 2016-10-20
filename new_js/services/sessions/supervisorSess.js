'use strict';

angular.module('filTutorApp')
	.service('SupervisorSess', ['CacheFactory', function(CacheFactory){
		
		var data = [];
		data.supData = [];


		var supCache = CacheFactory('supCache', {
				maxAge: 60 * 60 * 1000, // 1 hour,
				storageMode: 'sessionStorage'
			});

		function getSupData() {

			data.supData = supCache.get('sup_profiles');

			return data.supData;
		}

		function storeSupData(obj) {

			supCache.remove('sup_profiles');
			supCache.put('sup_profiles', obj);
		}


		function updateSpecSupData(sup_id, obj) {

			var supData_tmp = getSupData();

			for(var i = 0; i < supData_tmp.length; i++){
				if(supData_tmp.sup_id == sup_id) {
					supData_tmp[i] = obj;
				}
			}


			storeSupData(supData_tmp);
		}

		function putProfileData(sup_id, obj){

			// update tutor profile cache
			supCache.remove(sup_id);
			supCache.put(sup_id, obj);

			// update tutorlist data from cache
			updateSpecSupData(sup_id, obj);
		
		}

		function getSupId(userNameOrEmail) {

			var sup_id = '';

			angular.forEach(getSupData(), function(value, key){
				if(userNameOrEmail == value['username'] || userNameOrEmail == value['email']) {
					sup_id = value['supervisor_id'];
				}
			});

			return sup_id;
		}

		function getProfileData(userNameOrEmail){
			var sup_id = getSupId(userNameOrEmail);
			var sup_profile_data = supCache.get(sup_id);
			
			return sup_profile_data;
		}


		return {
			getSupData: getSupData,
			storeSupData: storeSupData,
			getProfileData: getProfileData,
			putProfileData:  putProfileData
		}

	}]);