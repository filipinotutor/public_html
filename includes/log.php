<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;


class Log {

	var $log;

	public function setLog($method, $logtype, $msg){
		$this->log->pushHandler(new StreamHandler('../app_error.log', Logger::WARNING));
		if($logtype ==  'w'){
			$this->log->warning($msg);
		} else if($logtype == 'e'){
			$this->log->error($msg);
		}
	}

	public function setLogName($name){
		$this->log = new Logger($name);
	}
}