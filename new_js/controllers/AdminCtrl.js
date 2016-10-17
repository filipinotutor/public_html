'use strict';

var $inject = ['$scope','$rootScope', '$stateParams', '$state', 'AdminSess', 'Admin', AdminCtrl];

	function AdminCtrl($scope, $rootScope, $stateParams, $state, AdminSess, Admin){

		$scope.isReady = false;
		$scope.adminlist = [];

		function initList() {
			Admin.get()
				.then(function(data){
					var data = data.data;

					AdminSess.storeAdminData(data[1]);

					$scope.adminlist = data[1];
			});
		}

		initList();

	}


angular.module('filTutorApp')
	.controller('AdminCtrl', $inject); 