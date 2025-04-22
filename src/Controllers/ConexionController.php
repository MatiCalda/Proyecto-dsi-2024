<?php 
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\BaseController;
use App\Controllers\DireccionController;

class ConexionController extends BaseController{
    public function setNew($request, $response, $args){
        $statusCode = 202;
        try {
            $data = json_decode($request->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
           /*  if($data->direccion->id == null){
                $direccionController = new DireccionController($this->container);
                $data->direccion = $direccionController->setNew($data->direccion);
            } */
    
            $pdo = $this->container->get('db');
            $stmt = $pdo->prepare("INSERT into conexion
            (fecha_alta, direccionID, servicioID, clienteID) values
            (:fecha_alta, :direccionID, :servicioID, :clienteID)");
            $stmt->execute([
                'fecha_alta' => $data->fecha_alta,
                'direccionID' => $data->direccionID,
                'servicioID' => $data->servicioID,
                'clienteID' => $data->clienteID 
                /* 'direccionID' => $data->direccion->id,
                'servicioID' => $data->servicio->id,
                'clienteID' => $data->cliente->id  */
            ]);
            $data->id = $pdo->lastInsertId();

            $response->getBody()->write(json_encode($data));
        } catch (\Exception $e) {
            $response->getBody()->write(json_encode($e));
            $statusCode = 500;
        }
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($statusCode);
    }
}
