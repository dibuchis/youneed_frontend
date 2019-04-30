<?php

namespace Youneed\Controllers;

use Youneed\App;

class API{


/*
*
* Getting user Info
* Return JSON data
*
*/
function getServicio(){

    $app = new App();

    $out = array(
            'response' => false,
        );

    if($app->isAjaxRequest()){

    if(isset($_REQUEST['servicioID'])){

            $srvID = $_REQUEST['servicioID'];
            
            $data = array (
                'serviceID' => $srvID
            );
            
            $params = '';
                foreach($data as $key=>$value)
                $params .= $key.'='.$value.'&';
            
            $params = trim($params, '&');

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://app.youneed.com.ec/ajax/getservicio');
        
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

            $response = json_encode($dataRes);
        
            echo $dataRes;
            

    }else{

        $response = json_encode($out);
        
        echo $response;


    }

    }else{
        header('Location: ' . $app->config->errorPage );
        exit;
    }

}

}