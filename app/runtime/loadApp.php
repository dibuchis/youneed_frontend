<?php

require __DIR__ . '../../../vendor/autoload.php';

use Youneed\App;
use Youneed\Controllers\User;

$app = new App();
$auth = new User();
$user = null;

if($auth->getSession() == "500"){
    header("Location" . $app->config->loginPage );
    die();
}else{
    $user = $auth->getSession();
}