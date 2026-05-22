<?php

class Cliente {

    private $idcliente;
    private $dni;
    private $nombre;
    private $apellido;
    private $correo;
    private $telefono;
    private $contra;
    public function __construct($idcliente, $dni, $nombre, $apellido, $correo, $telefono, $contra) {
        $this->idcliente = $idcliente;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->contra = $contra;
    }
    public function getIdcliente() {
        return $this->idcliente;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getContra() {
        return $this->contra;
    }

    public function setIdcliente($idcliente): void {
        $this->idcliente = $idcliente;
    }

    public function setDni($dni): void {
        $this->dni = $dni;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido): void {
        $this->apellido = $apellido;
    }

    public function setCorreo($correo): void {
        $this->correo = $correo;
    }

    public function setTelefono($telefono): void {
        $this->telefono = $telefono;
    }

    public function setContra($contra): void {
        $this->contra = $contra;
    }


    
}
