<?php

class Conexion {

    private $servidor = "mysql:host=localhost;dbname=Php_Proyecto_polleria_O_O";
    private $usuario = "root";
    private $contra = 1234;
    private $opciones = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    protected $conn = null;

    public function obtenerconexion() {
        try {
            $this->conn = new PDO($this->servidor, $this->usuario, $this->contra, $this->opciones);
            return $this->conn;
        } catch (PDOException $ex) {
            echo "ocurrio un problema de conexikon " . $ex->getMessage();
        }
        return null;
    }

    public function desconectar() {
        $this->conn = null;
    }

}
