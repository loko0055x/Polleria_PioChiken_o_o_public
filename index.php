<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        include './bl_logica_negocio/CategoriaPlatoBl.php';
        session_start();
        $obj = new CategoriaPlatoBl();
        $arreglocategoria = $obj->mostrarcategorias();
        ?>

    <center>  
        <label>Cabezera con navs -> si se puede un texto para buscar algo especifico -> Login</label>
    </center>

    <label>Slider Delos póllos </label>
    <br><br><br><br><br><br><br>


    <label>Promos BASE DE DATOS</label>


    <center> <label>Cartas aqui ponemos las categorias podriamos decir</label></center>
    <center>
        <h1>CARTAS</h1> 
    </center> 
    <br><br>
    <a href="#" style="position: absolute ; top: 15px; right: 15px;     text-decoration: none;">  
        <img src="imagenes-pollo/deslogin.jpg" style="width: 50px ;height: 50px">   
        Iniciar Session
    </a>
    <?php
    if (isset($_SESSION ["matriz"])) {
        ?>
        <a href="PagCarritoCompras.php" style="position: absolute ; top: 100px; right: 100px;     text-decoration: none;">  
            <img src="imagenes-pollo/USERS.png" style="width: 50px ;height: 50px">   
            <?php echo "Carrito Compras " . count($_SESSION ["matriz"]); ?>  
        </a>
        <?php
    }
    ?>

    <div class="container">
        <div class="row">

            <?php
            $i = 0;
            foreach ($arreglocategoria as $catmenu) {
                ?>
                <div class="col-4">

                    <p><?php echo $catmenu['nombrecategoria'] ?></p>
                    <div class="card" style="width: 19rem;">
                        <div class="card-body">               
                            <a href="login.php?idx=<?php echo $catmenu['id_catplato'] ?>"><img  src="<?php echo $catmenu["rutaimagen"] ?>" style="width: 275px ; height: 180px;"   class="card-img-top" alt="AQUI VA LA FOTO">
                            </a>
                        </div>
                    </div>
                </div>

                <?php echo $i == 2 ? "<h1>&nbsp</h1>" : "" ?>
                <?php
                $i++;
            }
            ?>






        </div>
    </div>



</body>
</html>
