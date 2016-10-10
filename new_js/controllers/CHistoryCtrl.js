'use strict';

angular.module('filTutorApp')
	.controller('CHistoryCtrl', ['$scope','$rootScope', '$stateParams', '$state'
		, function($scope, $rootScope, $stateParams, $state){

			$scope.isReady = false;
			$scope.CHistorylist = [];

			function initList() {
				
			}

			initList();

		}
	]);