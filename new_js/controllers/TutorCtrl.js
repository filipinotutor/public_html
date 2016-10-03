'use strict';

angular.module('filTutorApp')
	.controller('TutorCtrl', ['$scope','$rootScope', '$stateParams', '$state', 'TutorSess', 'Tutor'
		, function($scope, $rootScope, $stateParams, $state, TutorSess, Tutor){

			function initData() {
				Tutor.get()
					.then(function(data){
						var data = data.data;
						console.log('D: ' + JSON.stringify(data));
					});
			}

			initData();
			
		}
	]);


