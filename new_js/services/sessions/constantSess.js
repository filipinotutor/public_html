'use strict';

angular.module('filTutorApp')
	.service('ConstantSess', ['Supervisor', function(Supervisor){
		
		var data = [];
		
		data.tutor_type = [
			{ tutor_type_id: 1, tutor_type: 'BE', tutor_type_desc: 'Business English' },
			{ tutor_type_id: 2, tutor_type: 'ESL', tutor_type_desc: 'English as Secondary Language' }
		];

		data.teaching_exp = [
			{ teaching_exp_id: 1, teaching_exp_desc: ' < 6 mos ' },
			{ teaching_exp_id: 2, teaching_exp_desc: '6mos to 1year' },
			{ teaching_exp_id: 3, teaching_exp_desc: '1 - 3 years' },
			{ teaching_exp_id: 1, teaching_exp_desc: '> 3 years'}
		];
		
		data.educ_level = [
			{ educ_id: 1, educ_level_desc: 'Elementary' },
			{ educ_id: 2, educ_level_desc: 'Highschool' },
			{ educ_id: 3, educ_level_desc: 'College' },
			{ educ_id: 4, educ_level_desc: 'Master' },
			{ educ_id: 5, educ_level_desc: 'Doctorate' }
		];

		data.bank = [
			{ bank_id: 1, bank_name: "BPI" },
			{ bank_id: 2, bank_name: "BDO" },
			{ bank_id: 3, bank_name: "ChinaBank" },
			{ bank_id: 4, bank_name: "MetroBank" }
		];

		data.supervisor = [];


		function getConstant(request){
			var req_data = '';
			
			switch(request){
				case 'tutor_type':
					req_data = data.tutor_type;
				break;
				case 'teaching_exp':
					req_data = data.teaching_exp;
				break;
				case 'educ_level':
					req_data = data.educ_level;
				break;
				case 'bank':
					req_data = data.bank;
				break;
				case 'supervisor':
					req_data = data.supervisor;
				break;
			}

			return req_data;
		}

		function storeConstant(constant_name, value) {
			switch(constant_name){
				case 'tutor_type':
					data.tutor_type = value;
				break;
				case 'teaching_exp':
					data.teaching_exp = value;
				break;
				case 'educ_level':
					data.educ_level = value;
				break;
				case 'bank':
					data.bank = value;
				break;
				case 'supervisor':
					data.supervisor = value;
				break;
			}
		}

		return {
			getConstant: getConstant,
			storeConstant: storeConstant
		}

	}]);