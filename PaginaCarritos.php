<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    </head>
</head>
<body>
    <?php
    include './bl_logica_negocio/CategoriaPlatoBl.php';

    $dao = new CategoriaPlatoBl();
    $arreglo = null;
    $aux = "";
    if (isset($_GET["codplato"])) {
        $arreglo = $dao->mostrarunplato($_GET["codplato"]);
    } else if (isset($_GET["retornoidplato"])) {
        $arreglo = $dao->mostrarparaactualizar($_GET["retornoidplato"], $_GET["retornocatplato"]);
        $aux = "&&auxiliar=1";
    }
    ?>

    <a href="CerrarSession.php" style="position: absolute ; top: 15px; right: 15px;     text-decoration: none;">  
        <img src="imagenes-pollo/deslogin.jpg" style="width: 50px ;height: 50px">   
        Cerrar session

    </a>

    <br><br>
    <?php
    foreach ($arreglo as $menu_unidad) {
        ?>
        <div style="position: absolute; right: 500px; top:150px;">  
            <img src="<?php echo $menu_unidad['rutaimagen'] ?>" style="width: 450px; height: 300px">
        </div>

        <?php
        $numerostock = $menu_unidad['cantidad'];
        echo $numerostock;
        ?>


    <form action="controller/CarritoController.php?stock=<?php echo $numerostock ?> <?php echo $aux ?>" method="post">



            <p> Cantidad de Stock  <?php echo $menu_unidad["cantidad"] ?></p>

            <br><br><br> 
            <h1>Resumen de Pedido</h1>
            <p>Has seleccionado los siguientes platos:</p>
            <table>
                <tr>
                    <td><label>ID PLATO</label></td>
                    <td><input name="txtid" readonly type="text" value="<?php echo $menu_unidad['id_plato'] ?>"></td>
                </tr> 

                <tr>
                    <td><label>ID CATEGORIA PLATO</label></td>
                    <td><input name="txtcatplato" readonly type="text" value="<?php echo $menu_unidad['id_catplato'] ?>"></td>
                </tr> 

                <tr>
                    <td><label>Ruta Imagen</label></td>
                    <td><input name="txtimagen" readonly type="text" value="<?php echo $menu_unidad['rutaimagen'] ?>"></td>
                </tr> 
                <tr>
                    <td><label>Titulo</label></td>
                    <td>      <input name="txttitulo" readonly type="text" value="<?php echo $menu_unidad['titulo'] ?>" ></td>
                </tr>
                <tr>
                    <td><label>Descipcion</label></td>
                    <td>  <input name="txtdesc" readonly type="hidden" value="<?php echo $menu_unidad['descripcion'] ?>" ></td>
                </tr>
                <tr>
                    <td><label>Precio</label></td>
                    <td>     <input name="txtprecio" id="txtprecio" readonly type="text"  value="<?php echo $menu_unidad['precio'] ?>" ></td>
                </tr>

                <tr>
                    <td><label>Cantidad</label></td>
                    <td>   <input  id="txtcant" name="txtcant" type="number" max="<?php echo $menu_unidad["cantidad"] ?>"  min="1" required >    </td>
                <tr>
                    <td><label>Total</label></td>
                    <td> <input name="txttotal"  id="txttotal" readonly type="text" ></td>
                </tr>
            </table>
            <br> <br> 

            <input type="submit" value="Agregar Al carrito de compras" name="btnaggcarrito"> 
            <input type="submit" value="Comprar" name="btncomprar"> 

            <br>
            <label id="total"></label>

        </form>
        <?php
    }
    ?>

    <script>
        var cant = document.getElementById("txtcant");
        var precio = document.getElementById("txtprecio");
        // Obtener el contenido del label utilizando el método innerHTML
        var total = document.getElementById("txttotal");

        var numerophp = <?php echo json_encode($numerostock); ?>;


        cant.addEventListener("input", function () {

            var suma = (cant.value * precio.value);
            //este es para imprimir aun input
            //total.value = suma;

            if ((cant.value) >= 0 /*&& cant.value <= numerophp*/) {
                total.value = suma;
            } else {
                total.value = "";

            }
            //este es para imprimir en un label



        });
    </script>


</body>
</html>
