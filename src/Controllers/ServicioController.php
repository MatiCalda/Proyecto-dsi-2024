<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\BaseController;
use App\Models\Servicio;

class ServicioController extends BaseController{
    public function getAll($request, $response, $args){
        try {
            $pdo = $this->container->get('db');
            $stmt = $pdo->prepare("select id, cantidad_megas from servicio");
            $stmt->execute();

            if ($data = $stmt->fetchAll(\PDO::FETCH_CLASS, Servicio::class)) {
                $response->getBody()->write(json_encode($data));
            } else {
                $response->getBody()->write("no se encontro el cliente");
            }
        } catch (\Exception $e) {

        }

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}