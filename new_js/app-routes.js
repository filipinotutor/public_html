'use strict';

angular.module('filTutorApp', [
		'ui.router', 
		'oc.lazyLoad',
		'smart-table'
	]);

angular.module('filTutorApp')
	.run(['$rootScope', '$state', '$stateParams',
			function($rootScope, $state, $stateParams){

				$rootScope.$state = $state;
				$rootScope.$stateParams = $stateParams;

				$rootScope.$on('$stateChangeStart', function(){
					document.body.scrollTop = document.documentElement.scrollTop = 0;
				});
			}

	]);


angular.module('filTutorApp')
	.config([
		'$stateProvider', 
		'$urlRouterProvider',
		'$ocLazyLoadProvider', 
		function($stateProvider, $urlRouterProvider, $ocLazyLoadProvider){
			
			// Showing loaded JS
			$ocLazyLoadProvider.config({
				debug: true
			});

			$stateProvider
				.state('dashboard', {
					url: '/',
					views: {
						'main_content': { 
							templateUrl: 'admin_dashboard.php',
							controller: 'DashboardCtrl' 
						},
						'profile_details': { 
								templateUrl: '../new_sections/profile_details.php',
								controller: 'MenuCtrl'
						},
						'top-nav': { 
								templateUrl: '../new_sections/top-nav.php',
								controller: 'MenuCtrl'
						},
					},
					resolve: {
						loadModule: ['$ocLazyLoad', function($ocLazyLoad){
							return $ocLazyLoad.load([
								'new_js/factories/api.js',
								'new_js/services/session.js',
								'new_js/factories/UserFac.js',
								'new_js/services/sessions/userSess.js',
								'new_js/controllers/MenuCtrl.js',
								'new_js/controllers/DashboardCtrl.js'
							]);
						}]
					}
				})
				.state('profile_settings', {
					parent: 'dashboard',
					url: 'profile/settings',
					templateUrl: 'new_pages/profile/settings.php',
					controller: 'UserCtrl',
					resolve: {
						loadModule: ['$ocLazyLoad', function($ocLazyLoad){
							return $ocLazyLoad.load([
									'new_js/services/sessions/userSess.js',
									'new_js/factories/UserFac.js',
									'new_js/controllers/UserCtrl.js'
								]);
						}]
					}
				})
				.state('mailbox', {
					parent: 'dashboard',
					url: '/mailbox',
					templateUrl: 'new_pages/mailbox/mailbox.php'
				})
				.state('mailbox.inbox', {
					parent: 'dashboard',
					url: '/inbox',
					templateUrl: 'new_pages/mailbox/inbox.php'
				})
				.state('students', {
					parent: 'dashboard',
					url: 'students',
					templateUrl: 'new_pages/students/studentlist.php',
					controller: 'StudentCtrl',
					resolve: {
						loadModule: ['$ocLazyLoad', function($ocLazyLoad){
							return $ocLazyLoad.load([
								'new_js/services/sessions/studentSess.js',
								'new_js/factories/StudentFac.js',
								'new_js/controllers/StudentCtrl.js'
							]);
						}]
					}
				})
				.state('student_profile', {
					parent: 'dashboard',
					url: 'student/:userNameOrEmail',
					templateUrl: 'new_pages/students/student_profile.html',
					controller: 'StudentCtrl',
					resolve: {
						loadModule: ['$ocLazyLoad', function($ocLazyLoad){
							return $ocLazyLoad.load([
								'new_js/services/sessions/studentSess.js',
								'new_js/factories/StudentFac.js',
								'new_js/controllers/StudentCtrl.js'
							]);
						}]
					}
				})

				.state('tutors', {
					parent: 'dashboard',
					url: 'tutors',
					templateUrl: 'new_pages/tutors/tutorlist.php',
					controller: 'TutorCtrl',
					resolve: {
						loadModule: ['$ocLazyLoad', function($ocLazyLoad){
							return $ocLazyLoad.load([
								'new_js/services/sessions/tutorSess.js',
								'new_js/factories/TutorFac.js',
								'new_js/factories/UserFac.js',
								'new_js/controllers/TutorCtrl.js'
							]);
						}]
					}
				})
				.state('tutor_profile', {
					parent: 'dashboard',
					url: 'tutor/:userNameOrEmail',
					templateUrl: 'new_pages/tutors/tutor_profile.php',
					controller: 'TutorCtrl',
					resolve: {
						loadModule: ['$ocLazyLoad', function($ocLazyLoad){
							return $ocLazyLoad.load([
								'new_js/services/sessions/tutorSess.js',
								'new_js/factories/TutorFac.js',
								'new_js/controllers/TutorCtrl.js'
							]);
						}]
					}
				})

				.state('supervisors', {
					parent: 'dashboard',
					url: 'supervisors',
					templateUrl: 'new_pages/supervisors/supervisorlist.php',
					controller: 'SupervisorCtrl',
					resolve: {
						loadModule: ['$ocLazyLoad', function($ocLazyLoad){
							return $ocLazyLoad.load([
								'new_js/services/sessions/supervisorSess.js',
								'new_js/factories/SupervisorFac.js',
								'new_js/controllers/SupervisorCtrl.js'
							]);
						}]
					}
				})
				.state('supervisor_profile', {
					parent: 'dashboard',
					url: 'supervisor/:userNameOrEmail',
					templateUrl: 'new_pages/supervisors/supervisor_profile.html',
					controller: 'SupervisorCtrl',
					resolve: {
						loadModule: ['$ocLazyLoad', function($ocLazyLoad){
							return $ocLazyLoad.load([
								'new_js/services/sessions/supervisorSess.js',
								'new_js/factories/SupervisorFac.js',
								'new_js/controllers/SupervisorCtrl.js'
							]);
						}]
					}
				})

				.state('applicants', {
					parent: 'dashboard',
					url: 'applicants',
					templateUrl: 'new_pages/applicants/applicantlist.html',
					controller: 'ApplicantCtrl',
					resolve: {
						loadModule: ['$ocLazyLoad', function($ocLazyLoad){
							return $ocLazyLoad.load([
								'new_js/services/sessions/applicantSess.js',
								'new_js/factories/ApplicantFac.js',
								'new_js/controllers/ApplicantCtrl.js'
							]);
						}]
					}
				})


				.state('about', {
					url: '/about',
					views: {
						'': { templateUrl: 'partial-about.php' },
						'columnOne@about' : { template: 'columnOne@about' },
						'columnTwo@about' : { 
							templateUrl: 'column2Table.php',
							controller: 'col2Controller as col2Ctrl'
						}
					}
				});

				function loadJS(srcs, $q) {
					return {
						deps: ['$ocLazyLoad', '$q',
	                        function ($ocLazyLoad, $q) {
	                            var deferred = $q.defer();
	                            var promise = false;
	                            srcs = angular.isArray(srcs) ? srcs : srcs.split(/\s+/);
	                            if (!promise) {
	                                promise = deferred.promise;
	                            }
	                            angular.forEach(srcs, function (src) {
	                                promise = promise.then(function () {
	                                    return $ocLazyLoad.load(src);
	                                });
	                            });
	                            deferred.resolve();
	                            return callback ? promise.then(function () {
	                                return callback();
	                            }) : promise;
	                        }]
					}
				}

				$urlRouterProvider.otherwise('/');

}]);

