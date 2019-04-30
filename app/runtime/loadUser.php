<?php

require __DIR__ . '../../../vendor/autoload.php';
use Youneed\Controllers\User;
$auth = new User();
$user = $auth->getSession(false);