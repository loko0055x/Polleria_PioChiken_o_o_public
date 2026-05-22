<?php

require_once'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\entidades\Plato.php';
session_start();

if (isset($_POST["btnaggcarrito"])) {

    $platito = new Plato($_POST["txtid"], $_POST["txtcatplato"],
            $_POST["txttitulo"], $_POST["txtdesc"], $_POST["txtprecio"], $_POST["txtcant"], $_POST["txttotal"], $_POST["txtimagen"]);

    if (isset($_SESSION["matriz"])) {
        $matrizdata = $_SESSION['matriz'];

        $var = verificarsiexisteporcodigo($platito->getIdplato(), $platito->getIdcatplato(), $matrizdata);
        //verificamos si existe el codigo o no 
        // 0 = no existe por lo tanto lo agregamos
        //1 = si existe entonces no se agregara
        if ($var == 0) {
            array_push($matrizdata, $platito);
        } else {
            $estado = -1;
            if (isset($_GET["auxiliar"])) {
                //este es para si en el carrito de compras el cliente le da al BOTON MODIFICAR 
                //para que el stock se actualize  y no se acumule  
                //mas bien se sobreescriba el stock
                $estado = 1;
            }
            $stock = $_GET["stock"];
            //retorno la posicion dependiendo del id_plato y id_catplato
            $posicion = retornarposicion($platito->getIdplato(), $platito->getIdcatplato(), $matrizdata);
            //platoactualizado = es un metodo que me devuelve  un objeto de tipo Plato
            //ya validado y actualizado
            $objeto = platoactualizado($matrizdata[$posicion], $platito, $stock, $estado);
            $matrizdata[$posicion] = $objeto;
        }

        //todo lo que he hecho cambios  lo almacena en  $_SESSION['matriz'] 
        //para que sobreescriba y sea el actual session
        $_SESSION['matriz'] = $matrizdata;
    } else {
        $arreglo = array();
        array_push($arreglo, $platito);
        $_SESSION["matriz"] = $arreglo;
    }

    header("Location: ../index.php");
    exit();
}
//eliminar un plato o pedido del carrito de compras
else if (isset($_GET["idplato"])) {
    eliminaralgodelcarrito($_GET["idplato"], $_GET["idcatplato"]);
    header("Location: ../PagCarritoCompras.php");
    exit();
}
//tambien elimina pero este es en la pagina de pagos 
else if (isset($_GET["codelim"])) {
    eliminaralgodelcarrito($_GET["codelim"], $_GET["codcatplato"]);
    header("Location: ../PagPagos.php");
    exit();
}

//si el cliente le da al boton modificar entonces le aparecera ese mismo producto para el modifique asu antojo 
else if ($_GET["retornoidplato"]) {
    header("Location: ../PaginaCarritos.php?retornoidplato=" . $_GET["retornoidplato"] . "&&retornocatplato=" . $_GET["retornocatplato"] . "");
    exit();
}

function eliminaralgodelcarrito($id_plato = null, $idcatplato = null) {
    $matrizdata = $_SESSION['matriz'];
    $pos = retornarposicion($id_plato, $idcatplato, $matrizdata);
    array_splice($_SESSION['matriz'], $pos, 1);
}

//para que el codigo no se repita mas que nada para que no se agregue un producto existente
//este metodo me dira si existe o no existe
//si no existe ENCONCES AGREGARA CASO CONTRARIO NO AGREGA
//si es 0 = quiere decir que  no existe
//si es  -1= quiere decir que el codigo es repetido
function verificarsiexisteporcodigo($idplato = null, $idcatplato = null, $matrix = null) {
    $index = 0;
    foreach ($matrix as $plato) {
        if ($plato->getIdplato() == $idplato && $plato->getIdcatplato() == $idcatplato) {
            return -1;
        }
    }
    return $index;
}

//antiguo es la matrix
//reciente el que vieven
//este metodo tiene la lagica  y me retornara el objeto actualizado en si 
function platoactualizado($platoantiguo = null, $platoreciente = null, $stockBd = null, $auxiliar = null) {
    //stock  15 
    $cantidadactual = $platoantiguo->getCantidad();
    $cantidareciente = $platoreciente->getCantidad();
    $total = 0;
    // 50 <= 15
    $sumarcantidad = $cantidadactual + $cantidareciente;

    if ($sumarcantidad >= $stockBd) {
        // si es mayor entonces no lo sumees 
        $total = $platoreciente->getTotal();
        $sumarcantidad = $platoantiguo->getCantidad();
    } else {
        $total = $sumarcantidad * $platoantiguo->getPrecio();
    }
    if ($auxiliar == 1) {
        $sumarcantidad = $platoreciente->getCantidad();
    }

    $platoupdate = new Plato($platoreciente->getIdplato(), $platoreciente->getIdcatplato()
            , $platoreciente->getTitulo(), $platoreciente->getDescripcion(), $platoreciente->getPrecio(),
            $sumarcantidad, $total, $platoreciente->getRutaimagen());
    return $platoupdate;
}

//me retorna la posicion demi arreglo
function retornarposicion($idplato = null, $idcatplato = null, $matrix = null) {
    $pos = 0;
    foreach ($matrix as $plato) {
        if ($plato->getIdplato() == $idplato && $plato->getIdcatplato() == $idcatplato) {
            break;
        }
        $pos++;
    }
    return $pos;
}

//este metodo no lo usare
function mostrararregloporcodigo($idplato = null, $idcatplato = null, $matrx = null) {
    return $matrx[retornarposicion($idplato, $idcatplato)];
}

/*
  function actualizararreglo($platito = null, $matrixx = null) {
  echo "<br>xxxxxxxxxxxxxxxxxxxxxx";
  $posicion = retornarposicion($platito->getIdplato(), $platito->getIdcatplato(), $matrixx);
  echo "pos [" . $posicion . "]";

  //  echo $matrixx[$posicion]->getPrecio();


  //   $plato = $matrixx[$posicion];
  echo "<br>" . $plato->getTitulo();

  $cantidadactual = $plato->getCantidad();
  $cantidareciente = $platito->getCantidad();

  $sumarcantidad = $cantidadactual + $cantidareciente;

  $total = $sumarcantidad * $plato->getPrecio();

  echo "ACTUAL : " . $cantidadactual . " RECIENTE : " . $cantidareciente . "<br>"
  . "SUMA CANTIDAD  :", $sumarcantidad . "<br>";

  // $ds= new Plato($idplato, $idcatplato, $titulo, $descripcion, $precio, $cantidad, $total, $rutaimagen);

  $platoupdate = new Plato($plato->getIdplato(), $plato->getIdcatplato()
  , $plato->getTitulo(), $plato->getDescripcion(), $plato->getPrecio(),
  $sumarcantidad, $total, $plato->getRutaimagen());

  echo "<br>idplato :" . $platoupdate->getIdplato() . "   <br>"
  . "idcate plato :" . $platoupdate->getIdcatplato() . "<br>"
  . "titulo :" . $platoupdate->getTitulo() . "<br>"
  . "descripcion :" . $platoupdate->getDescripcion() . "<br>"
  . "precio :" . $platoupdate->getPrecio() . "<br>"
  . "cantidad :" . $platoupdate->getCantidad() . "<br>"
  . "ruta imagen :" . $platoupdate->getRutaimagen() . "<br>"
  . "total :" . $platoupdate->getTotal() . "<br>";

  //$matrixx[$posicion] = $platoupdate;

  return $platoupdate;

  }
 */


//--------------------------------------------------------------------------------------------------

//para que el codigo no se repita mas que nada para que no se agregue un producto existente
//este metodo me dira si existe o no existe
//si no existe ENCONCES AGREGARA CASO CONTRARIO NO AGREGA
//si es 0 = quiere decir que  no existe
//si es  -1= quiere decir que el codigo es repetido
//function verificarsiexisteporcodigo($idplato = null, $idcatplato = null, $matrix = null) {
//    $index = 0;
//    foreach ($matrix as $plato) {
//        if ($plato->getIdplato() == $idplato && $plato->getIdcatplato() == $idcatplato) {
//            return -1;
//        }
//    }
//    return $index;
//}
//
////antiguo es la matrix
////reciente el que vvien
//function platoactualizado($platoantiguo = null, $platoreciente = null, $stockBd = null, $auxiliar = null) {
//    //stock  15 
//    $cantidadactual = $platoantiguo->getCantidad();
//    $cantidareciente = $platoreciente->getCantidad();
//    $total = 0;
//    // 50 <= 15
//    $sumarcantidad = $cantidadactual + $cantidareciente;
//
//    if ($sumarcantidad >= $stockBd) {
//        // si es mayor entonces no lo sumees 
//        $total = $platoreciente->getTotal();
//        $sumarcantidad = $platoantiguo->getCantidad();
//    } else {
//        $total = $sumarcantidad * $platoantiguo->getPrecio();
//    }
//    if ($auxiliar == 1) {
//        $sumarcantidad = $platoreciente->getCantidad();
//    }
//
//    $platoupdate = new Plato($platoreciente->getIdplato(), $platoreciente->getIdcatplato()
//            , $platoreciente->getTitulo(), $platoreciente->getDescripcion(), $platoreciente->getPrecio(),
//            $sumarcantidad, $total, $platoreciente->getRutaimagen());
//    return $platoupdate;
//}
//
///*
//  function actualizararreglo($platito = null, $matrixx = null) {
//  echo "<br>xxxxxxxxxxxxxxxxxxxxxx";
//  $posicion = retornarposicion($platito->getIdplato(), $platito->getIdcatplato(), $matrixx);
//  echo "pos [" . $posicion . "]";
//
//  //  echo $matrixx[$posicion]->getPrecio();
//
//
//  //   $plato = $matrixx[$posicion];
//  echo "<br>" . $plato->getTitulo();
//
//  $cantidadactual = $plato->getCantidad();
//  $cantidareciente = $platito->getCantidad();
//
//  $sumarcantidad = $cantidadactual + $cantidareciente;
//
//  $total = $sumarcantidad * $plato->getPrecio();
//
//  echo "ACTUAL : " . $cantidadactual . " RECIENTE : " . $cantidareciente . "<br>"
//  . "SUMA CANTIDAD  :", $sumarcantidad . "<br>";
//
//  // $ds= new Plato($idplato, $idcatplato, $titulo, $descripcion, $precio, $cantidad, $total, $rutaimagen);
//
//  $platoupdate = new Plato($plato->getIdplato(), $plato->getIdcatplato()
//  , $plato->getTitulo(), $plato->getDescripcion(), $plato->getPrecio(),
//  $sumarcantidad, $total, $plato->getRutaimagen());
//
//  echo "<br>idplato :" . $platoupdate->getIdplato() . "   <br>"
//  . "idcate plato :" . $platoupdate->getIdcatplato() . "<br>"
//  . "titulo :" . $platoupdate->getTitulo() . "<br>"
//  . "descripcion :" . $platoupdate->getDescripcion() . "<br>"
//  . "precio :" . $platoupdate->getPrecio() . "<br>"
//  . "cantidad :" . $platoupdate->getCantidad() . "<br>"
//  . "ruta imagen :" . $platoupdate->getRutaimagen() . "<br>"
//  . "total :" . $platoupdate->getTotal() . "<br>";
//
//  //$matrixx[$posicion] = $platoupdate;
//
//  return $platoupdate;
//
//  }
// */
//
//function retornarposicion($idplato = null, $idcatplato = null, $matrix = null) {
//    $pos = 0;
//    foreach ($matrix as $plato) {
//        if ($plato->getIdplato() == $idplato && $plato->getIdcatplato() == $idcatplato) {
//            break;
//        }
//        $pos++;
//    }
//    return $pos;
//}

 