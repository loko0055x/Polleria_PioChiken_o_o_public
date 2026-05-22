<?php

require_once'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\bl_logica_negocio\BoletaBL.php';
require_once'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\entidades\Boleta.php';
require_once'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\entidades\Plato.php';
require_once'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\bl_logica_negocio\CategoriaPlatoBl.php';
session_start();
$obj = new CategoriaPlatoBl();

//este solo es mostrar namas podriamos decir el reporte
//aca IRIA EL METODO PARA ACTUALIZAR STOCK
//actualizaria el stock y ala vez agregaria Boleta ala base de datos
if (isset($_POST["btnrealizarpago"])) {
    echo $_POST["cmdtipopago"];

    $totalapagar = 0;
    foreach ($_SESSION["matriz"] as $platito) {
         $obj->actualizarstock($platito->getCantidad(), $platito->getIdplato(), $platito->getIdcatplato());
        echo "<br>  update plato set cantidad=cantidad-" . $platito->getCantidad() . " where id_plato=" . $platito->getIdplato() . " and id_catplato=" . $platito->getIdcatplato() . ";  <br>";
        $totalapagar = $totalapagar + $platito->getTotal();
    }
    $bola = new Boleta(0, $_POST["txtdni"], $_POST["txtnom"] . "" . $_POST["txtapellido"], "Surco", null, $_POST["cmdtipopago"], $_POST["txttotal"]);

    $blblbl = new BoletaBL();
    $blblbl->agregarboleta($bola);
 
    unset($_SESSION['matriz']);
 
    header("Location: ../boleta.php");
    exit();
}
 