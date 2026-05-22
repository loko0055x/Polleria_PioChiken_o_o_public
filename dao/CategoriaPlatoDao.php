<?php

require_once'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\conexion\Conexion.php';

class CategoriaPlatoDao {

    private $conex;

    // private $instancia;

    public function __construct() {
        $this->conex = new Conexion();
    }

    /* public static function crearinstancia() {
      if (self::$instancia == null) {
      self::$instancia = new CategoriaPlatoDao();
      }
      return self::$instancia;
      } */

    public function mostrarcategorias() {
        $con = $this->conex->obtenerconexion();
        $sql = "SELECT *FROM categoriaplato;";

        $resultado = $con->query($sql);
        $arreglocategorias = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $this->conex->desconectar();

        return $arreglocategorias;
    }

    public function mostrarplatosporcategoria($codcategoria) {

        $con = $this->conex->obtenerconexion();
        $sql = "SELECT *FROM PLATO where id_catplato='" . $codcategoria . "';";
        $resultado = $con->query($sql);
        $arregloplatos = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $this->conex->desconectar();

        return $arregloplatos;
    }

     
    public function busquedaplato($id_catplato, $titulo) {

    $con = $this->conex->obtenerconexion();
        $sql = "select * from  plato where id_catplato=".$id_catplato." and titulo like '".$titulo."%';";
    $resultado = $con->query($sql);
    $arregloplatos = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $this->conex->desconectar();

    return $arregloplatos;
}

function mostrarunplato($idplato) {
    $con = $this->conex->obtenerconexion();
    $sql = " select *from plato where id_plato= " . $idplato . ";";
    $resultado = $con->query($sql);
    $arregloplatito = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $this->conex->desconectar();

    return $arregloplatito;
}

function updatestock($cantidad, $idplato, $idcatplato) {
    $con = $this->conex->obtenerconexion();
    //$sql = "update plato set cantidad=cantidad-".$cantidad." where id_plato=".$idplato." and id_catplato=".$idcatplato.";";
    $sql = "update plato set cantidad=cantidad-? where id_plato=? and id_catplato=?;";

    try {

        $sentenciasql = $con->prepare($sql);
        $sentenciasql->bindParam(1, $cantidad);
        $sentenciasql->bindParam(2, $idplato);
        $sentenciasql->bindParam(3, $idcatplato);

        $sentenciasql->execute();

        $this->conex->desconectar();
    } catch (Exception $ex) {
        echo "" . $ex->getMessage();
    }
}

function mostrareditarplato($idplato, $idcatplato) {
    $con = $this->conex->obtenerconexion();
    $sql = "select * from plato where id_plato=" . $idplato . " and id_catplato=" . $idcatplato . ";";
    $resultado = $con->query($sql);
    $arregloplatito = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $this->conex->desconectar();
    return $arregloplatito;
}

public $arreglo = array();

function agregararreglo($matrix = null, $platito = null) {
    //if ($this->verificarsiexisteporcodigo($platito->getIdplato(), $platito->getIdcatplato()) == 0) {
    // array_push($this->arreglo, $platito);
    //  } else {
    //      echo "codigo repetido ";
    //     $this->actualizararreglo($platito);
    //  }

    array_push($matrix, $platito);
}

public function actualizararreglo($platito = null) {

    $plato = $this->mostrararregloporcodigo($platito->getIdplato(), $platito->getIdcatplato());

    $cantidadactual = $plato->getCantidad();
    $cantidareciente = $platito->getCantidad();
    $posicion = $this->retornarposicion($plato->getIdplato(), $plato->getIdcatplato());
    $sumarcantidad = $cantidadactual + $cantidareciente;

    $total = $sumarcantidad * $plato->getPrecio();
    $platoupdate = new Plato($plato->getIdplato(), $plato->getIdcatplato()
            , $plato->getTitulo(), $plato->getDescripcion(), $plato->getPrecio(), $sumarcantidad, $total, $plato->getRutaimagen());

    $this->arreglo[$posicion] = $platoupdate;
}

public function eliminararreglo($idplato = null, $idcatplato = null, $matrix = null) {
    array_splice($matrix, $this->retornarposicion($idplato, $idcatplato), 1);
}

//para que el codigo no se repita mas que nada para que no se agregue un producto existente
//este metodo me dira si existe o no existe
//si no existe ENCONCES AGREGARA CASO CONTRARIO NO AGREGA
//si es 0 = quiere decir que  no existe
//si es  -1= quiere decir que el codigo es repetido
public function verificarsiexisteporcodigo($idplato = null, $idcatplato = null, $matrix = null) {
    $index = 0;
    foreach ($matrix as $plato) {
        if ($plato->getIdplato() == $idplato && $plato->getIdcatplato() == $idcatplato) {
            return -1;
        }
    }
    return $index;
}

//Metodo que me retorna la posicion para que para eliminar un arreglo

public function retornarposicion($idplato = null, $idcatplato = null, $matrix = null) {
    $pos = 0;
    foreach ($matrix as $plato) {
        if ($plato->getIdplato() == $idplato && $plato->getIdcatplato() == $idcatplato) {
            break;
        }
        $pos++;
    }
    return $pos;
}

public function mostrararreglo() {

    //   echo "<br>Mostrar arreglo <br>";
    //  foreach ($this->arreglo as $pl) {
    //    echo $pl->getTitulo() . "  -  " . $pl->getPrecio() . " - " . $pl->getCantidad() . "<br>";
    //  }

    return $this->arreglo;
}

public function mostrararregloporcodigo($idplato = null, $idcatplato = null, $matrx = null) {
    return $matrx[$this->retornarposicion($idplato, $idcatplato)];
}

}
