<?php

class Plato {

    private $idplato;
    private $idcatplato;
    private $titulo;
    private $descripcion;
    private $precio;
    private $cantidad;
    private $total;
    private $rutaimagen;

    
    
    public function __construct($idplato, $idcatplato, $titulo, $descripcion, $precio, $cantidad, $total, $rutaimagen) {
        $this->idplato = $idplato;
        $this->idcatplato = $idcatplato;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
        $this->total = $total;
        $this->rutaimagen = $rutaimagen;
    }

    public function getIdplato() {
        return $this->idplato;
    }

    public function getIdcatplato() {
        return $this->idcatplato;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getTotal() {
        return $this->total;
    }

    public function getRutaimagen() {
        return $this->rutaimagen;
    }

    public function setIdplato($idplato): void {
        $this->idplato = $idplato;
    }

    public function setIdcatplato($idcatplato): void {
        $this->idcatplato = $idcatplato;
    }

    public function setTitulo($titulo): void {
        $this->titulo = $titulo;
    }

    public function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function setPrecio($precio): void {
        $this->precio = $precio;
    }

    public function setCantidad($cantidad): void {
        $this->cantidad = $cantidad;
    }

    public function setTotal($total): void {
        $this->total = $total;
    }

    public function setRutaimagen($rutaimagen): void {
        $this->rutaimagen = $rutaimagen;
    }


}
