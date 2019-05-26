<?php 

require __DIR__ . '/vendor/autoload.php';

use Youneed\App;

$app = new App();

header('Location: ' . $app->config->loginPage );
exit;