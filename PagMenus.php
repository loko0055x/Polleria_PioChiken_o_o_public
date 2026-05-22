<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <link href="CarpetaStilos/estilomenu.css" rel="stylesheet"> 

        <style>
            body {
                /*  background: #000000;*/
            }

            .contiene {
                display: inline-block;
            }

            .fila {
                display: flex;
                background: #000;
                border-radius: 100px;
                border: 1px solid #3b3b3b;

            }

            .fila input {
                background: transparent;
                color: #fff;
                font-weight: 600;
                font-size: 15px;
                border: none;
                padding: 0;
                width: 0;
                outline: none;
                transition: all 0.2s;
            }


            .icon {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 45px;
                height: 45px;
                margin: 7px;
                border-radius: 50%;
                background: #ffffff;

            }




            .icon i {
                position: absolute;
                color: #222222;
            }

            .icon .fa-times {
                opacity: 0;
            }

            .contiene:hover input,
            input:focus,
            input:not(:placeholder-shown) {
                width: 250px;
                padding: 1ren;
                padding-left: 1.5rem;
            }

            .contiene:hover .fa-times,
            input:focus+.icon .fa-times,
            input:not(:placeholder-shown)+.icon .fa-times {
                opacity: 1;
            }

            .contiene:hover .fa-search,
            input:focus+.icon .fa-search,
            input:not(:placeholder-shown)+.icon .fa-search {
                opacity: 0;
            }
        </style>
    </head>
    <body>


        <?php
        require_once './bl_logica_negocio/CategoriaPlatoBl.php';

        session_start();
        if (isset($_SESSION["usuariosession"])) {
            echo " si la sesion esta actuva";
        } else {
            /// no hay sesion 
            echo "es que no hay una session ps manito LOGEATExxxxxxxx";
        }

        $dao = new CategoriaPlatoDao();

        $arreglomenu = null;
        $busqueda = "";
        $codex = 15;

        if (isset($_SESSION['codigobuscar'])) {
            $busqueda = $_SESSION['codigobuscar'];
        }
        if (isset($_GET["codcategoria"])) {
            $codex = $_GET["codcategoria"];
            $arreglomenu = $dao->mostrarplatosporcategoria($_GET["codcategoria"]);
            $_SESSION['auxcodcategoria'] = $_GET["codcategoria"];
        } else {

            $arreglomenu = $dao->busquedaplato($_SESSION['auxcodcategoria'], $busqueda);
        }
        ?>

        <a href="CerrarSession.php" style="position: absolute ; top: 15px; right: 15px;     text-decoration: none;">  
            <img src="imagenes-pollo/deslogin.jpg" style="width: 50px ;height: 50px">   
            Cerrar session
        </a>

        <a href="index.php">Volver al menu principal</a>



        <div class="contiene" style="width: 300px;  height: 100px ;position: relative; right: -350px; top: 5px;">
            <div class="fila">
                <input type="text" value="<?php echo $busqueda ?>" placeholder="search" id="txtcod">
                <div class="icon">
                    <i class="fa fa-search"></i>
                    <i class="fa fa-times"></i>
                </div>
            </div>
        </div>


        <br> 
        <br><br>     <br><br>     <br><br>

        <div data-v-7f506464="" class="filter-carta-w">
        </div>
        <div data-v-7f506464="" class="has_subs-groups-w">
            <div data-v-7f506464="" class="has_subs-group"><!---->
                <div data-v-7f506464="" class="products-grid">




                    <!---  EMPIEZA  -->
                    <?php
                    foreach ($arreglomenu as $menu) {
                        $num = $menu["precio"];

                        $entero = intval($num);
                        $decimal = fmod($num, 1) * 100;
                        ?>

                        <div data-v-3fe639f4="" data-v-7f506464="" class="product-grid-item-w">
                            <div data-v-3fe639f4="" class="product-grid-item">
                                <div data-v-3fe639f4="" class="product-grid-item-img-w">
                                    <figure data-v-3fe639f4="">
                                        <div data-v-3fe639f4=""><img
                                                src="<?php echo $menu['rutaimagen'] ?>"
                                                alt="error foto" class="item-grid-img"> <!----></div>
                                    </figure>
                                    <div data-v-3fe639f4="" class="grid-item-preferences"><span data-v-3fe639f4=""></span></div>
                                </div>
                                <div data-v-3fe639f4="" class="product-grid-item-ctn-w">
                                    <div data-v-3fe639f4="" class="product-grid-item-ctn">
                                        <h4 data-v-3fe639f4=""><a data-v-3fe639f4=""
                                                                  href="/carta/promociones/costillas-a-la-bbq.html"><?php echo $menu['titulo'] ?></a></h4>
                                        <div data-v-3fe639f4="" class="product-grid-item-body">
                                            <div data-v-3fe639f4="" class="product-grid-item-ctn-txt">
                                                <p data-v-3fe639f4=""><?php echo $menu['descripcion'] ?></p>
                                            </div>
                                            <div data-v-3fe639f4="" class="product-grid-prices">

                                                <div data-v-3fe639f4="" class="product-grid-prices-current"><small data-v-3fe639f4=""
                                                                                                                   class="symbol">S/ </small><strong data-v-3fe639f4=""><?php echo $entero . "." ?></strong><small data-v-3fe639f4=""
                                                                                                                   class="decimal"><?php echo $decimal ?></small></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-v-3fe639f4="" class="product-grid-item-btn hasTerms" style="">
                                        <a href="PaginaCarritos.php?codplato=<?php echo $menu['id_plato'] ?>" >
                                            <button data-v-3fe639f4="" type="button"
                                                    class="btn btn-new">COMPRAR</button>
                                        </a>
                                    </div>

                                </div> 

                            </div>

                        </div>




                        <?php
                    }
                    ?>



                    <!---  TERMINE -->



                </div>
            </div>
        </div>

        <script>




            var codigo = document.getElementById("txtcod");
            //para que el request focust siempre este es como el requestfocus en JAVA es que servira como se reinicia la pagina pues
            codigo.focus();
            //para que el focus este el el ultimo caracter del texto
            codigo.setSelectionRange(txtcod.value.length, txtcod.value.length);
            codigo.addEventListener("input", function () {
                //tambien es  importante por que recuerda que mi en mi controller  (/buscarregistro) requiere de un paramtro para que acceda ala pagina
                var cadena = codigo.value;

                location.href = "controller/PlatosController.php?codbus=" + cadena + "";
            });






        </script>


    </body>
</html>
