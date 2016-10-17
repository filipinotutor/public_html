'use strict';

var $inject = ['$scope', '$rootScope', DashboardCtrl];

	function DashboardCtrl($scope, $rootScope){
		
		var vm = this;
		// vm.isReady = false;

		$scope.submit = function () {
			

		}
	}


angular.module('filTutorApp')
	.controller('DashboardCtrl', $inject);