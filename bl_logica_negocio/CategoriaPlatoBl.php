<?php

require_once 'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\dao\CategoriaPlatoDao.php';

class CategoriaPlatoBl {

    private $categoriadao;

    public function __construct() {
        $this->categoriadao = new CategoriaPlatoDao();
    }

    public function mostrarcategorias() {
        return $this->categoriadao->mostrarcategorias();
    }

    public function mostrarplatoxcategoria($codcategoria) {
        return $this->categoriadao->mostrarplatosporcategoria($codcategoria);
    }

    public function mostrarunplato($idplato) {
        return $this->categoriadao->mostrarunplato($idplato);
    }

    public function mostrarparaactualizar($idplato, $idcatplato) {
        return $this->categoriadao->mostrareditarplato($idplato, $idcatplato);
    }

    public function buscarquedaplato($id_catplato, $titulo) {
        $this->categoriadao->busquedaplato($id_catplato, $titulo);
    }

    public function actualizarstock($cantidad, $idplato, $idcatplato) {
        $this->categoriadao->updatestock($cantidad, $idplato, $idcatplato);
    }

}
