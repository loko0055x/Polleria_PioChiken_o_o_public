<?php

class Boleta {

    private $idboleta;
    private $dnicliente;
    private $nombrescliente;
    private $ubicacion;
    private $fecha_compra;
    private $tipodepago;
    private $total;
    public function __construct($idboleta, $dnicliente, $nombrescliente, $ubicacion, $fecha_compra, $tipodepago, $total) {
        $this->idboleta = $idboleta;
        $this->dnicliente = $dnicliente;
        $this->nombrescliente = $nombrescliente;
        $this->ubicacion = $ubicacion;
        $this->fecha_compra = $fecha_compra;
        $this->tipodepago = $tipodepago;
        $this->total = $total;
    }

    public function getIdboleta() {
        return $this->idboleta;
    }

    public function getDnicliente() {
        return $this->dnicliente;
    }

    public function getNombrescliente() {
        return $this->nombrescliente;
    }

    public function getUbicacion() {
        return $this->ubicacion;
    }

    public function getFecha_compra() {
        return $this->fecha_compra;
    }

    public function getTipodepago() {
        return $this->tipodepago;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setIdboleta($idboleta): void {
        $this->idboleta = $idboleta;
    }

    public function setDnicliente($dnicliente): void {
        $this->dnicliente = $dnicliente;
    }

    public function setNombrescliente($nombrescliente): void {
        $this->nombrescliente = $nombrescliente;
    }

    public function setUbicacion($ubicacion): void {
        $this->ubicacion = $ubicacion;
    }

    public function setFecha_compra($fecha_compra): void {
        $this->fecha_compra = $fecha_compra;
    }

    public function setTipodepago($tipodepago): void {
        $this->tipodepago = $tipodepago;
    }

    public function setTotal($total): void {
        $this->total = $total;
    }


}
