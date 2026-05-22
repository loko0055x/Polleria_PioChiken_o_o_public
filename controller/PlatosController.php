<?php

require_once'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\entidades\Plato.php';
require_once 'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\bl_logica_negocio\ClienteBL.php';
session_start();
 
 if (isset($_GET["codbus"])) {

    $_SESSION['codigobuscar'] = $_GET["codbus"];

    header("Location: ../PagMenus.php");
    exit();
}
 