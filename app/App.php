<?php
/*
*
* Youneed FrontEnd APP
*
*/

namespace Youneed;

class App{


    /*** CONST'S ***/
    
    const APP_BASEURL = "https://youneed.com.ec/app/";
    //const APP_BASEURL = "http://localhost/youneed_frontend/";
    const APP_HOMEURL = "https://youneed.com.ec";
    var $config = [];

    /*** FUNCTIONS ***/

    function __construct(){
        $params = (object) array(
            'token' => '8e705fdb6ed22df72e4fcbeb37bcf517',
            'errorPage' => 'https://youneed.com.ec/404-error/',
            'loginPage' => self::APP_BASEURL . 'login.php',
            'code'=> (object) array(
                    'success' => '200',
                    'error' => '500'
                )
        );
        $this->config= $params;
    }

    function isAjaxRequest(){

        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        {    
            return true;
        }else{
            return false;
        }

    }
}