<?php
header('Access-Control-Allow-Origin: *'); 
require __DIR__ . '/vendor/autoload.php';

use Youneed\App;
use Youneed\Controllers\User;

$app = new App();
$auth = new User();
	
session_start();

if(isset($_SESSION)){
	if(isset($_SESSION['api_userdata']) && $_SESSION['api_token'] == $app->config->token ){
		// var_dump($_SESSION);
		header("Location: " . $app::APP_BASEURL . "dashboard.php");
		exit;
	}
}

require __DIR__ . '/views/_loginForm.php'; 