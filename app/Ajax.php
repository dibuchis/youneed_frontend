<?php

echo $_SERVER['DOCUMENT_ROOT'];
echo "<br>";
echo (dirname(__FILE__) . '/vendor/autoload.php');
echo "<br>";
echo (dirname(__FILE__) . '../vendor/autoload.php');
echo "<br>";
echo (dirname(__FILE__) . '../../vendor/autoload.php');
echo "<br>";

echo (__DIR__ . '/vendor/autoload.php');
echo "<br>";
echo (__DIR__ . '../vendor/autoload.php');
echo "<br>";
echo (__DIR__ . '../../vendor/autoload.php');
echo "<br>";

exit();

require_once(dirname(__FILE__) . '../vendor/autoload.php');

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