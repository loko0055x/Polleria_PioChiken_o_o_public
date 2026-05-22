<?php

require_once 'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\dao\BoletadDao.php';
class BoletaBL {

    private $boletadao;

    public function __construct() {
        $this->boletadao = new BoletadDao();
    }

    function agregarboleta($boleta) {
        $this->boletadao->saveboleta($boleta);
    }

    function mostrarboletacliente() {
      return  $this->boletadao->mostrarboletapagos();
    }

}
