<?php

require_once 'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\dao\ClienteDao.php';

class ClienteBL {

    private $clientedao;

    public function __construct() {
        $this->clientedao = new ClienteDao();
    }

    function agregarcliente($cliente) {
        $this->clientedao->savecliente($cliente);
    }

    public function verificarsiexistecliente($correo,$contra) {
        return $this->clientedao->clienteexiste($correo, $contra);
    }

}
