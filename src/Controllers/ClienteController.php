<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\BaseController;
use App\Models\Cliente;

class ClienteController extends BaseController {

    public function getCliente($request, $response, $args) {
        try {
            $pdo = $this->container->get('db');
            $stmt = $pdo->prepare("select p.id, p.nombre, p.apellido, p.dni, c.numero_telefonico from cliente c
                inner join persona p on c.personaID = p.id
                and p.dni like :dni;");
            $stmt->execute([
                'dni' => $args['dni'].'%'
            ]);

            if ($cliente = $stmt->fetchAll(\PDO::FETCH_CLASS, Cliente::class)) {
                $response->getBody()->write(json_encode($cliente));
            } else {
                $response->getBody()->write("no se encontro el cliente");
            }
        } catch (\Exception $e) {
            $response->getBody()->write(json_encode($e));
            
        }

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}