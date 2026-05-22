<?php

require_once'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\conexion\Conexion.php';
require_once 'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\entidades\Cliente.php';

class ClienteDao {

    private $conex;

    public function __construct() {
        $this->conex = new Conexion();
    }

    function savecliente($cliente) {
        $con = $this->conex->obtenerconexion();
        $sql = "insert into cliente (dni,nombre,apellido,correo,telefono,contra) values
 (?,?,?,?,?,?);";
        try {
            $sentenciasql = $con->prepare($sql);

            $sentenciasql->bindValue(1, $cliente->getDni());
            $sentenciasql->bindValue(2, $cliente->getNombre());
            $sentenciasql->bindValue(3, $cliente->getApellido());
            $sentenciasql->bindValue(4, $cliente->getCorreo());
            $sentenciasql->bindValue(5, $cliente->getTelefono());
            $sentenciasql->bindValue(6, $cliente->getContra());
            $sentenciasql->execute();
            $this->conex->desconectar();
        } catch (Exception $ex) {
            echo "" . $ex->getMessage();
        }
    }

    function clienteexiste($correo, $contra) {
        $con = $this->conex->obtenerconexion();
        $sql = "SELECT * FROM cliente WHERE correo = ? AND contra = ?";
        try {
            $sentenciasql = $con->prepare($sql);
            $sentenciasql->bindParam(1, $correo);
            $sentenciasql->bindParam(2, $contra);
            $sentenciasql->execute();
            $arregloplatos = $sentenciasql->fetchAll(PDO::FETCH_ASSOC);
            $this->conex->desconectar();
            return $arregloplatos;
        } catch (Exception $ex) {
            echo "" . $ex->getMessage();
        }

        return null;
    }

}
