<?php/* * Sample bootstrap file. */// Include the composer autoloaderif(!file_exists(__DIR__ .'/autoload.php')) {	echo "The 'vendor' folder is missing. You must run 'composer update' to resolve application dependencies.\nPlease see the README for more information.\n";	exit(1);}require __DIR__ . '/autoload.php';define("PP_CONFIG_PATH", __DIR__);use PayPal\Rest\ApiContext;use PayPal\Auth\OAuthTokenCredential;// ### Api Context// Pass in a `PayPal\Rest\ApiContext` object to authenticate // the call. You can also send a unique request id // (that ensures idempotency). The SDK generates// a request id if you do not pass one explicitly. $apiContext = new ApiContext(new OAuthTokenCredential(		'AVUM8xDOwutOJEDIQ8j5qN6WqNTYUTMdLf27J0zCp5W8KDwC_V07SDsohWk5',		'EON_NRBrQh_A_fUeTgPqgiDOibKcxRhCm89fj6TwG6nAa2n4SXdl3O4RL5Hr'//	$_SESSION['id'],$_SESSION['secret']	));// Uncomment this step if you want to use per request // dynamic configuration instead of using sdk_config.ini/* sdk configuration to override PP_CONFIG_PATH if you have sdk_config.ini file configuration */$apiContext->setConfig(array(	'mode' => 'sandbox', //  or live	'http.ConnectionTimeOut' => 30,	'log.LogEnabled' => true,	'log.FileName' => 'PayPal.log',	'log.LogLevel' => 'FINE')); /** * ### getBaseUrl function * // utility function that returns base url for * // determining return/cancel urls * @return string */function getBaseUrl() {	$protocol = 'http';	if ($_SERVER['SERVER_PORT'] == 443 || (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on')) {		$protocol .= 's';		$protocol_port = $_SERVER['SERVER_PORT'];	} else {		$protocol_port = 80;	}	$host = $_SERVER['HTTP_HOST'];	$port = $_SERVER['SERVER_PORT'];	$request = $_SERVER['PHP_SELF'];	return dirname($protocol . '://' . $host . ($port == $protocol_port ? '' : ':' . $port) . $request);}