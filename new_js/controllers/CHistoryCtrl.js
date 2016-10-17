'use strict';

var $inject = ['$scope','$rootScope', '$stateParams', '$state', '$q', 'CHistory', 'CHistorySess', 'TutorSess', CHistoryCtrl];

angular.module('filTutorApp')
	.controller('CHistoryCtrl', $inject);


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


	