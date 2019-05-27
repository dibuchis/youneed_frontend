<?php
header('Access-Control-Allow-Origin: *'); 
//require $_SERVER['DOCUMENT_ROOT'] . '/app/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . "/youneed_frontend/vendor/autoload.php";

use Youneed\App;
use Youneed\Controllers\Api;
use Youneed\Controllers\User;

if(isset($_GET) || isset($_POST) ){
    
    $fn = $_REQUEST["fn"];
    
    $app = new App();
    $api = new Api();
    $user = new User();
    
    /*
    * Get Api Servicios 
    * 
    * @data JSON
    * return Bolean
    *
    */
    if($fn == 'GetServicio'){
        $api->getServicio();
    }

    /*
    * Get User
    * 
    * @data JSON
    * return User
    *
    */
    if($fn == 'getUser'){
        $user->getUser();
    }
	
	/*
    * Contratar Asociado
    * 
    * @data JSON
    * return Status set
    *
    */
    if($fn == 'ContratarAsociado'){
        $api->contratarAsociado();
    }

    /*
    * User login 
    * 
    * @data JSON
    * return User
    *
    */
    if($fn == 'login'){
        if(isset($_POST['username']) && isset($_POST['password'])){
            $user->login($_POST['username'], $_POST['password']);
        }else{
            $user->login('', '');
        }
    }

    /*
    * User logout 
    * 
    * @data JSON
    * return User
    *
    */
    if($fn == 'logout'){
        $user->logout();
    }

}