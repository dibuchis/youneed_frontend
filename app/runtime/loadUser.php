<?php

require __DIR__ . '../../../vendor/autoload.php';
use Youneed\Controllers\User;
use Youneed\Controllers\Api;
$auth = new User();
$user = $auth->getSession(false);

if($user){
	$api = new Api();
}

$tipo_notificacion = [
	1 => '',
	2 => '',
	3 => '',
	4 => '',
	5 => 'Tienes una nueva solicitud de servicio',
	6 => 'Tienes un servicio que ha sido aceptado',
	7 => '',
	8 => '',
	9 => 'Has solicitado un nuevo servicio',
	10 => '',
	11 => '',
	12 => '',
];

$estado_usuario = [
	1 => 'Activo',
	2 => 'Inactivo',
];

$estados_pedido = [
	0 => 'En espera',
	1 => 'Reservada',
	2 => 'En ejecución',
	3 => 'Pagada',
	4 => 'Cancelada',
];