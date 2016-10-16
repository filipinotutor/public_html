'use strict';

var $inject = ['CacheFactory', 'Tutor', TutorSess];

angular.module('filTutorApp')
	.service('TutorSess', $inject);

		function TutorSess(CacheFactory, Tutor){
			
			var data = [];
			data.tutorData = [];
			data.tutorProf = null;

			var profileCache = CacheFactory('profileCache', {
				maxAge: 60 * 60 * 1000, // 1 hour,
				deleteOnExpire: 'aggressive',
				storageMode: 'sessionStorage',
				onExpire: function() {
					Tutor.get()
						.then(function(data){
							profileCache.put('tutor_profiles', data);
						});
				}
			});

			function getTutorData() {

				data.tutorData = profileCache.get('tutor_profiles');
				return data.tutorData;
			}

			function storeTutorData(obj) {
				
				// data.tutorData = obj;
				profileCache.remove('tutor_profiles');

				profileCache.put('tutor_profiles', obj);
			}

			function updateSpecTutorData(tutor_id, obj) {

				var tutorData_tmp = getTutorData();

				for(var i = 0; i < tutorData_tmp.length; i++){
					if(tutorData_tmp.tutor_id == tutor_id) {
						tutorData_tmp[i] = obj;
					}
				}



				storeTutorData(tutorData_tmp);
			}

			function getTutorId(userNameOrEmail) {

				var tutor_id = '';

				angular.forEach(getTutorData(), function(value, key){
					if(userNameOrEmail == value['username'] || userNameOrEmail == value['email']) {
						tutor_id = value['tutor_id'];
					}
				});

				return tutor_id;
			}

			function getProfileData(userNameOrEmail) {

				var tutor_id = getTutorId(userNameOrEmail);
				var tutor_profile_data = profileCache.get(tutor_id);
				
				return tutor_profile_data;
			}

			function putProfileData(tutor_id ,obj) {

				// update tutor profile cache
				profileCache.remove(tutor_id);
				profileCache.put(tutor_id, obj);


				// update tutorlist data from cache
				updateSpecTutorData(tutor_id, obj);

			}

			function removeProfileData(tutor_id) {
				profileCache.remove(tutor_id);
			}

			return {
				getTutorData: getTutorData,
				storeTutorData: storeTutorData,
				putProfileData: putProfileData,
				getProfileData: getProfileData,
				getTutorId: getTutorId
			}

		}