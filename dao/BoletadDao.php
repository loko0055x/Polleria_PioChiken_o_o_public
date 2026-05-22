<?php

require_once'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\conexion\Conexion.php';
require_once 'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\entidades\Boleta.php';

class BoletadDao {

    private $conex;

    public function __construct() {
        $this->conex = new Conexion();
    } 

    function saveboleta($boleta) {
        $con = $this->conex->obtenerconexion();
        $sql = " insert into boleta (dnicliente,nombrescliente,ubicacion,tipodepago,total)
 values (?,?,?,?,?);
 ";
        try {
            $sentenciasql = $con->prepare($sql);
            $sentenciasql->bindValue(1, $boleta->getDnicliente());
            $sentenciasql->bindValue(2, $boleta->getNombrescliente());
            $sentenciasql->bindValue(3, $boleta->getUbicacion());
            $sentenciasql->bindValue(4, $boleta->getTipodepago());
            $sentenciasql->bindValue(5, $boleta->getTotal());

            $sentenciasql->execute();

            $this->conex->desconectar();
        } catch (Exception $ex) {
            echo "" . $ex->getMessage();
        }
    }

    function mostrarboletapagos() {
        $con = $this->conex->obtenerconexion();
     $sql = "select *from boleta where idboleta=(select  MAX(idboleta)  from boleta); ";

        $resultado = $con->query($sql);
        $arreglocategorias = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $this->conex->desconectar();
        return $arreglocategorias;
    }

}
