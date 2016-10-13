'use strict';

angular.module('filTutorApp')
	.service('ConstantSess', [function(){
		
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
			{ educ_id: 5, educ_level_desc: 'Doctor' }
		];

		data.bank = [
			{ bank_id: 1, bank_name: "BPI" },
			{ bank_id: 2, bank_name: "BDO" },
			{ bank_id: 3, bank_name: "ChinaBank" },
			{ bank_id: 4, bank_name: "MetroBank" }
		];

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
			}

			return req_data;
		}

		function storeConstant(obj) {
			data = obj;
		}

		return {
			getConstant: getConstant,
			storeConstant: storeConstant
		}

	}]);