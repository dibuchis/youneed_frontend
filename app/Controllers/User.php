<?php 

namespace Youneed\Controllers;

use Youneed\App;

class User{

/*
*
* Getting user Info
* Return JSON data
*
*/
function getUser(){
    
    $app = new App();
    
    if(session_id() == '' || !isset($_SESSION)) {
        // session isn't started
        session_start();
   }
   
   
    if(isset($_SESSION["api_userdata"]) && isset($_SESSION["api_token"])){
            
        if($app->isAjaxRequest() && $app->config->token == $_SESSION["api_token"]){ 
            echo json_encode($_SESSION["api_userdata"]);
        }else if($app->config->token == $_SESSION["api_token"]){
            return $_SESSION["api_userdata"];
        };

   }else{
        echo json_encode(null);
       //header('Location: '. $app->config->errorPage);
       //echo "TOFO";
   }
}

/*
*
* Check Session status
* return Mixed
*
*/
function getSession($returnAjax = true){

    $app = new App();
    $data = null;

    if(session_id() == '' || !isset($_SESSION)) {
        // session isn't started
        session_start();
   }
   
   if(isset($_SESSION["api_userdata"])){
        $data = $_SESSION["api_userdata"];
   }
   
   if(!$data){
       if($app->isAjaxRequest()){    
           die("Acceso no autorizado");
       }else{
           return $app->config->code->error;
           //header('Location: '. $app->config->loginPage);
       }
   }else{
       if($app->isAjaxRequest() && $returnAjax){    
           echo json_encode($user = $data->usuario);
           //echo $app->config->code->success;
           //return true;
       }else{
           // return true;
           //header('Location: '. $app->loginPage);
           //exit($app->config->code->success);
           return $data->usuario;
           //return $app->config->code->success;
       }
   };

}

function login($username, $password){

    $app = new App();

    $out = array(
        'login' => false,
    );

    if(isset($username) && isset($password) ){

        $data = array (
        'email' => $username,
        'clave' => $password
        );
       
       $params = '';
           foreach($data as $key=>$value)
           $params .= $key.'='.$value.'&';
        
       $params = trim($params, '&');

       $ch = curl_init();

       curl_setopt($ch, CURLOPT_URL, 'https://app.youneed.com.ec/api/login');
   
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); //Timeout after 7 seconds
       curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
       curl_setopt($ch, CURLOPT_HEADER, 0);
       
       //We add these 2 lines to create POST request
       curl_setopt($ch, CURLOPT_POST, count($data)); //number of parameters sent
       
       curl_setopt($ch, CURLOPT_POSTFIELDS, $params); //parameters data
    
       $dataRes = curl_exec($ch);

       curl_close($ch);
       
       

       //$out['login'] = true;

       $response = json_decode($dataRes);
       
       if($response->status){
           if(!isset($_SESSION)) {
                // session isn't started
                session_start();
           }
           
            $current_session_id = session_id();
       
            $_SESSION['api_session_id'] = $current_session_id;
            $_SESSION['api_userdata'] = $response->data;
            $_SESSION['api_token'] = $app->config->token;
           
       };
   
       echo json_encode($dataRes);


    }else{

    $response = json_encode($out);
    
    echo $response;


    }

}

function logout(){
    if(!isset($_SESSION)) {
        // session isn't started
        session_start();
   }
   
   session_destroy();
   echo true;
}


function registrarCliente(){

    $out = array(
        'status' => 0,
    );

    if(isset($_POST)){


    //     foreach($_POST as $key=>$value)
    //         $params .= $key.'='.$value.'&';
        
    //    $params = trim($params, '&');

        echo $_POST;
        exit();

       $ch = curl_init();

       curl_setopt($ch, CURLOPT_URL, 'https://app.youneed.com.ec/api/register');
   
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); //Timeout after 7 seconds
       curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
       curl_setopt($ch, CURLOPT_HEADER, 0);
       
       //We add these 2 lines to create POST request
       curl_setopt($ch, CURLOPT_POST, count($_POST)); //number of parameters sent
       
       curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST); //parameters data
    
       $dataRes = curl_exec($ch);

       curl_close($ch);
       
       

       //$out['login'] = true;

       $response = json_decode($dataRes);
       
       if($response->status){
           if(!isset($_SESSION)) {
                // session isn't started
                session_start();
           }
           
            $current_session_id = session_id();
       
            $_SESSION['api_session_id'] = $current_session_id;
            $_SESSION['api_userdata'] = $response->data;
            $_SESSION['api_token'] = $app->config->token;
           
       };
   
       echo json_encode($dataRes);


    }else{

    $response = json_encode($out);
    
    echo $response;


    }

}


}