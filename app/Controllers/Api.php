<?php

namespace Youneed\Controllers;

use Youneed\App;

class Api{


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

function cargarPedidos($id){
    $res = null;
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, 'https://app.youneed.com.ec/api/getpedidos?uid=' . $id);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); //Timeout after 7 seconds
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
    curl_setopt($ch, CURLOPT_HEADER, array('Content-Type: application/x-www-form-urlencoded'));
    
    $res = curl_exec($ch);
    
    curl_close($ch);
    
    return json_decode($res);
}

function confirmarPedido($id){
    // $res = null;
    // $ch = curl_init();
    
    // curl_setopt($ch, CURLOPT_URL, 'https://app.youneed.com.ec/ajax/getpedidos?uid=' . $id);
    
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
    // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); //Timeout after 7 seconds
    // curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
    // curl_setopt($ch, CURLOPT_HEADER, 0);
    
    // $res = curl_exec($ch);
    
    // curl_close($ch);
    
    // return json_decode($res);
    echo true;
    exit();
}

function cancelarPedido($id){
    // $res = null;
    // $ch = curl_init();
    
    // curl_setopt($ch, CURLOPT_URL, 'https://app.youneed.com.ec/ajax/getpedidos?uid=' . $id);
    
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
    // curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); //Timeout after 7 seconds
    // curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
    // curl_setopt($ch, CURLOPT_HEADER, 0);
    
    // $res = curl_exec($ch);
    
    // curl_close($ch);
    
    // return json_decode($res);
    echo true;
    exit();
}

function contratarAsociado(){

    $app = new App();

    $response = array(
            'status' => 0,
        );
		

    if($app->isAjaxRequest()){

    if(isset($_POST)){
	}
			// $query = "?servicio_id=" . $_POST['servicio_id'] . "&";
			// $query .= "asociado_id=" . $_POST['asociado_id'] . "&";
			// $query .= "cliente_id=" . $_POST['cliente_id'];

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://app.youneed.com.ec/api/contratarasociado');
        
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

            $response = json_encode($dataRes);
        
            echo $dataRes;
	}else{
		echo json_encode($response);
	}
}

function cargarNotificaciones($id){
    $nots = null;
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, 'https://app.youneed.com.ec/api/getnotificaciones?uid=' . $id);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); //Timeout after 7 seconds
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    
    $res = curl_exec($ch);
    
    curl_close($ch);
    
    return json_decode($res);
}

}