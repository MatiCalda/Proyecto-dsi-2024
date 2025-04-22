<?php

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\ClienteController;
use App\Controllers\ServicioController;
use App\Controllers\DireccionController;
use App\Controllers\ConexionController;

$app->group('/api', function (RouteCollectorProxy $group) {
    $group->get('/cliente/{dni}[/{optionalSlash:.*}]', [ClienteController::class, 'getCliente']);

    $group->get('/servicios[/{optionalSlash:.*}]', [ServicioController::class, 'getAll']);

    $group->get('/provincias[/{optionalSlash:.*}]', [DireccionController::class, 'getProvincias']);
    $group->get('/localidades/provincia/{idProvincia}[/{optionalSlash:.*}]', [DireccionController::class, 'getLocalidades']);
    
    
    $group->get('/direccion[/{optionalSlash:.*}]', [DireccionController::class, 'getID']);
    $group->post('/direccion/nuevo[/{optionalSlash:.*}]', [DireccionController::class, 'setNew']);

    $group->post('/conexion/nuevo[/{optionalSlash:.*}]', [ConexionController::class, 'setNew']);
});

