<?php

require_once'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\entidades\Cliente.php';
require_once'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\bl_logica_negocio\ClienteBL.php';

//verificar si existe el cliente
//y si existe pues se crea una session caso contrario le redirigira ala misma pagina del login hasta que 
//se logee
session_start();
if (isset($_POST["btnlogin"])) {

    //SI la cuenta existe crea una session
    //caso contrario no crees nada y quedate ahi
    $codcategoria = $_GET["codcat"];

    $clientebll = new ClienteBL();
    $axxx = $clientebll->verificarsiexistecliente($_POST["txtuser"], $_POST["txtpass"]);
    if ($axxx == null) {
        echo "NO EXISTE NE LA BASE DE DATO";
        header("Location: ../index.php");
        exit();
    } else {
        $_SESSION ["usuariosession"] = $axxx;
        header("Location: ../PagMenus.php?codcategoria=" . $codcategoria . "");
        exit();
    }
} else if (isset($_POST["btnagregar"])) {

    $cliente = new Cliente(0, $_POST["txtdni"], $_POST["txtnom"]
            , $_POST["txtape"], $_POST["txtcorreo"], $_POST["txttelef"], $_POST["txtcontra"]);
    $blcliente = new ClienteBL();
    $blcliente->agregarcliente($cliente);

    $_SESSION ["usuariosession"] = $cliente;
    header("Location: ../index.php");
} else if (isset($_POST["xx"])) {
    
}
