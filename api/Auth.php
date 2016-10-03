<?php 

session_start();

class Auth {
		
		var $user = '';
		var $isAllowed = true;

		public static function guard(){
			if(isset($_SESSION['user'])){
				return true;
			} else {
				return false;
			}
		}
	}


	/*
	- Students
	- Supervisor
	- Tutors
	- credits
	- 



	*/