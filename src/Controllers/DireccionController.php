<?php
namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controllers\BaseController;
use App\Models\Provincia;
use App\Models\Localidad;
use App\Models\Direccion;

class DireccionController extends BaseController{
    public function getProvincias($request, $response, $args){
        try {
            $pdo = $this->container->get('db');
            $stmt = $pdo->prepare("SELECT id, nombre from provincia");
            $stmt->execute();

            if ($data = $stmt->fetchAll(\PDO::FETCH_CLASS, Provincia::class)) {
                $response->getBody()->write(json_encode($data));
            }else{
                $response->getBody()->write("no se encontro");
            }
        } catch (\Exception $e) {

        }
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
    public function getLocalidades($request, $response, $args) {
        try {
            $pdo = $this->container->get('db');
            $stmt = $pdo->prepare("SELECT id, nombre, provinciaID from localidad
            where provinciaID = :idProvincia");
            $stmt->execute([
                'idProvincia' => $args['idProvincia']
            ]);

            $data = 'no se encontro';
            if ($data = $stmt->fetchAll(\PDO::FETCH_CLASS, Localidad::class)) {
            }
            $response->getBody()->write(json_encode($data));
        } catch (\Exception $e) {

        }
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
    /* public function setNew($direccion) { */
    public function setNew($request, $response, $args) {
        try {
            $direccion = json_decode($request->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
           
            $pdo = $this->container->get('db');
            $stmt = $pdo->prepare("INSERT into direccion (calle, departamento, numero, piso, localidadID)
            values (:calle, :departamento, :numero, :piso, :localidadID)");
            $stmt->execute([
                'calle' => $direccion->calle,
                'departamento' => $direccion->departamento,
                'numero' => $direccion->numero,
                'piso' => $direccion->piso,
                'localidadID' => $direccion->localidadID
                /* 'localidadID' => $direccion->localidad->id */
            ]);
            $direccion->id = $pdo->lastInsertId();
            $response->getBody()->write(json_encode($direccion));
        } catch (\Exception $e) {
            throw $e;
        }

        /* return $direccion */
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);;
    }
    public function getID($request, $response, $args) {
        try {
            $direccion = json_decode($request->getBody()->getContents(), false, 512, JSON_THROW_ON_ERROR);
            $pdo = $this->container->get('db');
            $stmt = $pdo->prepare("SELECT id from direccion
            where calle = :calle and departamento = :departamento and numero = :numero and piso = :piso and localidadID = :localidadID");
            $stmt->execute([
                'calle' => $direccion->calle,
                'departamento' => $direccion->departamento,
                'numero' => $direccion->numero,
                'piso' => $direccion->piso,
                //'localidadID' => $direccion->localidad->id
                'localidadID' => $direccion->localidadID
            ]);

            if ($data = $stmt->fetchAll(\PDO::FETCH_CLASS, Direccion::class)) {
                $direccion->id = $data[0]->id;
            }
            $response->getBody()->write(json_encode($direccion));
        } catch (\Exception $e) {
            $response->getBody()->write(json_encode($e));
        }
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}