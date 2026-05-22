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
        //si hay una sesion entoncews no se hace nada

        $cod = $_GET["idx"];

        session_start();

        if (isset($_SESSION["usuariosession"])) {
            //si hay una session    
            header("Location: PagMenus.php?codcategoria=" . $cod . " ");
            exit();
        } else { 
            /// no hay sesion 
            echo "es que no hay una session ps manito LOGEATE";
        }

         
        ?>

        <br>         <br> 
        <br> 
        <br> 
        <br>         <br> 
        <br> 
        <br> 
        <a href="PagRegistro.php" style="position: absolute ; top: 15px; right: 15px;     text-decoration: none;">  
            <img src="imagenes-pollo/deslogin.jpg" style="width: 50px ;height: 50px">   
            Crear Cuenta
        </a>

        <div class="container">
            <form action="controller/ClienteController.php?codcat=<?php echo $cod ?>" method="post">   
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text"  class="form-control-plaintext" value="salegodotita@gmail.com"  name="txtuser"  >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control"  id="inputPassword" name="txtpass" value="15">
                    </div>
                    <br>

                </div>
                <input type="submit" name="btnlogin" value="Iniciar Session">

            </form>
        </div>
    </body>
</html>
