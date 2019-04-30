<?php

require $_SERVER['DOCUMENT_ROOT'] . '/app/vendor/autoload.php';

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
    * User login 
    * 
    * @data JSON
    * return User
    *
    */
    if($fn == 'login'){
        $user->login($username, $password);
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