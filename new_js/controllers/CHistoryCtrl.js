'use strict';

angular.module('filTutorApp')
	.controller('CHistoryCtrl', ['$scope','$rootScope', '$stateParams', '$state', '$q', 'CHistory', 'CHistorySess'
		, function($scope, $rootScope, $stateParams, $state, $q, CHistory, CHistorySess){

			$scope.isReady = false;
			$scope.CHistorylist = [];

			function initList() {

				setTimeout(function() {

					var user_id = CHistorySess.getCHUserId();

					CHistory.getByUserId(user_id)
						.then(function(data){
							
							var data = data.data;

							$scope.chistorylist = data[1][0];
							

						});

				}, 2000);

			}

			initList();

		}
	]);


	