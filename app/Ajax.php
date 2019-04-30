<?php

require __DIR__ . '../../vendor/autoload.php';

use Youneed\App;
use Youneed\Controllers\API;
use Youneed\Controllers\User;

if(isset($_GET) || isset($_POST) ){
    
    $fn = $_REQUEST["fn"];
    
    $app = new App();
    $api = new API();
    $user = new User();
    
    /*
    * Get API Servicios 
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
        echo $user->getUser();
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
        echo $user->logout();
    }

}