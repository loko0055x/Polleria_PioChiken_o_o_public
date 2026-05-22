<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="CarpetaStilos/estilospago.css" rel="stylesheet"> 
    </head>
    <body>
        <?php
        require_once'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\entidades\Cliente.php'; /////////////////////

        require_once'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\entidades\Plato.php';

        session_start();

        // ACA obtenemos los datos del cliente que se ha regisstrado
        //recuerod que creaaste una session al momento de logearte o al momento de registrarte
        ?>

        <div>
            <a href="index.php">VOLVER AL MNENU PRINCIPAL </a>

        </div>
        <h1> Pagos</h1>
        <?php
        foreach ($_SESSION["usuariosession"] as $arreglo) {
            echo "entro ".$arreglo->getNombre();
        }
        ?>

        <form action="controller/BoletaController.php" method="post">

            <?php
            foreach ($_SESSION["usuariosession"] as $arreglo) {
                ?>

                <table>
                    <tr>  
                        <td><lable>Nombre :</lable></td>
                    <td><input type="text" name="txtnom" value="<?php echo "" ?>"></td>
                    </tr>
                    <tr>  
                        <td><lable>Apellido :</lable></td>
                    <td><input type="text" name="txtapellido" value=""></td>
                    </tr>
                    <tr>  
                        <td><lable>Dni :</lable></td>
                    <td><input type="text" name="txtdni" value=""></td>
                    </tr> 
                    <tr>  
                        <td><lable>Correo :</lable></td>
                    <td><input type="text" name="txtcorreo" value=""></td>
                    </tr>
                    <tr>  
                        <td><lable>Celular :</lable></td>
                    <td><input type="text" name="txtcel" value=""></td>
                    </tr>

                    <tr>  
                        <td><lable>Ubicacion :</lable></td>
                    <td><input type="text" name="txtubicacion" value=""></td>
                    </tr>

                    <tr>  
                        <td><lable>ELIGE ELL TIPO DE PAGO</lable></td>
                    <td> 
                        <select name="cmdtipopago">
                            <option>YAPE </option>
                            <option>Plin </option>
                            <option>SCOTIABAKC </option>
                        </select>
                    </td>
                    </tr>
                </table>
                <?php
            }
            ?>  



            <h1> SI ES QUE SE PUEDE AQUI SALDRIA SU UBICACION </h1>



            <h1> RESUMEN DE COMPRA</h1>
            <section data-v-741cc2b8="" class="account-countent-item-white checkout-order-items-container">
                <strong data-v-741cc2b8="" href="" class="checkout-section-semititle">Resumen de tu
                    compra</strong>
                <div data-v-741cc2b8="" class="checkout-order-list">


                    <?php
                    $totalapagar = 0;
                    foreach ($_SESSION["matriz"] as $platito) {
                        $totalapagar = $totalapagar + $platito->getTotal();
                        ?>

                        <div data-v-741cc2b8="" class="checkout-order-item-r">
                            <div data-v-741cc2b8="" class="checkout-order-item-tp">
                                <h5 data-v-741cc2b8="" class="">
                                    <?php echo "" . $platito->getCantidad() . " x  " . "" . $platito->getDescripcion() ?>
                                </h5>
                                <a href="controller/CarritoController.php?codelim=<?php echo $platito->getIdplato() ?> && codcatplato=<?php echo $platito->getIdcatplato() ?>">  
                                    <img data-v-741cc2b8="" 
                                         src="https://d3uqmu8cgrse7a.cloudfront.net/dist/client/img/f0adaa7.svg" 
                                         alt="" class="checkout-order-item-removei"> 
                                </a>
                            </div> <!---->
                            <div data-v-741cc2b8="" class="checkout-item-minigrid">
                                <span data-v-741cc2b8="">Resumen de nuevo</span> 
                                <b data-v-741cc2b8="">S/<?php echo $platito->getTotal() ?></b>
                            </div>
                        </div>

                        <?php
                        //  $subtotal = ($platito->getPrecio() * $platito->getCantidad());
                        //  $totalapagar = $totalapagar + $subtotal;
                    }
                    ?>







                </div> <!---->
            </section>


            <section data-v-741cc2b8="" class="checkout-summarize-w account-countent-item-white checkout-order-items-container">
                <div data-v-741cc2b8="" class="checkout-summarize">
                    <div data-v-741cc2b8="" class="underline"><b data-v-741cc2b8="">Subtotal</b> <span data-v-741cc2b8="">    S/ <?php echo $totalapagar ?></span></div>
                    <div data-v-741cc2b8="" class="underline"><b data-v-741cc2b8="">Delivery</b> <span data-v-741cc2b8="">S/ 0</span></div>
                    <div data-v-741cc2b8="" class="underline" style="display: none;"><b data-v-741cc2b8="">Descuento:</b> <b data-v-741cc2b8="">- S/ 0.00</b></div>
                    <div data-v-741cc2b8="" class="underline underline-bolder"><b data-v-741cc2b8="">Total</b> <b data-v-741cc2b8="">S/ <?php echo $totalapagar ?></b></div>
                    <input type="hidden" name="txttotal" readonly value="<?php echo $totalapagar?>"> 

                    <div data-v-741cc2b8="" class="checkout-summary-factura">


                        <button data-v-741cc2b8="" type="submit" name="btnrealizarpago" class="btn btn-md btn-send">
                            Realizar Proceso de pago <!----></button>
                    </div>
                </div>
            </section>
        </form>
    </body>
</html>
