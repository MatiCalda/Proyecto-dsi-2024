<?php 

use Slim\Factory\AppFactory;

require __DIR__ . '/../../vendor/autoload.php';

$aux = new \DI\Container();
AppFactory::setContainer($aux);
$app = AppFactory::create();
$container = $app->getContainer();

require __DIR__ . '/Routes.php';
require __DIR__ . '/Configs.php';
require __DIR__ . '/Dependencies.php';

$app->addErrorMiddleware(true, true, true);

$app->run();