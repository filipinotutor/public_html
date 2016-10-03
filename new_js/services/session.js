'use strict';

angular.module('filTutorApp')
	.service('session', [ function(){
		
		var data = {};

		function getUserData() {
			return data.userData;
		}

		function storeUserData(obj) {
			data.userData = obj;
		}

		function getAllUsers() {
			return data.allUsers;
		}

		function storeAllUsers(obj) {
			data.allUsers = obj;
		}

		return {
			getUserData: getUserData,
			storeUserData: storeUserData,
			getAllUsers: getAllUsers,
			storeAllUsers: storeAllUsers
		}

	}]);