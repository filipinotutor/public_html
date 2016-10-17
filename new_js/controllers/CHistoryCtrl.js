'use strict';

var $inject = ['$scope','$rootScope', '$stateParams', '$state', '$q', 'CHistory', 'CHistorySess', 'TutorSess', CHistoryCtrl];

	function CHistoryCtrl($scope, $rootScope, $stateParams, $state, $q, CHistory, CHistorySess, TutorSess){

		$scope.isReady = false;
		$scope.CHistorylist = [];

		function initList() {

			var userNameOrEmail = $stateParams.userNameOrEmail;
			var tutor_id = TutorSess.getTutorId(userNameOrEmail);

			CHistory.getByUserId(tutor_id)
				.then(function(data){

					$scope.chistorylist = data;
					
				});
		}

		initList();

	}

angular.module('filTutorApp')
	.controller('CHistoryCtrl', $inject);