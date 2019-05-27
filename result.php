<?php
header('Access-Control-Allow-Origin: *'); 
require __DIR__ . '/vendor/autoload.php';

use borales\extensions\phoneInput\PhoneInput;

use Youneed\App;
use Youneed\Controllers\User;

$app = new App();
$auth = new User();

session_start();
	
if(isset($_SESSION)){
    if(isset($_SESSION['api_userdata']) && $_SESSION['api_token'] == $app->config->token ){
        // var_dump($_SESSION);
        // header("Location: " . $app::APP_BASEURL . "dashboard.php");
		require __DIR__ . '/views/layouts/navbar_blank.php'; 
		require __DIR__ . '/views/_success.php'; 
        exit;
    }
}
