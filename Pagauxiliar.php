<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once'C:\xampp\htdocs\PHP_Polleria_PioChiken_O_O\entidades\Plato.php';
        session_start();
        
         echo "".$_POST["cmdtipopago"];
        ?>

                <table>
                    <tr>  
                        <td><lable>ID BOLETA :</lable></td>
                <td><input type="text" name="txtid" value="1"></td>
            </tr>
            <tr>  
                <td><lable>DNI </lable></td>
        <td><input type="text" name="txtdni" value="74530613"></td>
        </tr>
        <tr>  
            <td><lable>Nombres :</lable></td>
        <td><input type="text" name="txtnombres " value="Leonardo Migule salazar huamani"></td>
        </tr> 
        <tr>  
            <td><lable>Ubicacion :</lable></td>
        <td><input type="text" name="txtubicacion" value="Panamericana Norte"></td>
        </tr>
        <tr>  
            <td><lable>Fecha compra :</lable></td>
        <td><input type="text" name="txtfecha" value="01/10/2023"></td>
        </tr>
        <tr>  
            <td><lable>Tipo Pago :</lable></td>
        <td><input type="text" name="txttipopag" value="Paypal"></td>
        </tr>
        <tr>  
            <td><lable>Total</lable></td>
        <td><input type="text" name="txtfecha" value="S/ 500"></td>
        </tr>
        </table>

              <?php
            foreach ($_SESSION["matriz"] as $platito) {           
                 echo "<br>  update plato set cantidad=cantidad-".$platito->getCantidad()." where id_plato=".$platito->getIdplato()." and id_catplato=".$platito->getIdcatplato().";  <br>";
            }
            ?>
            <br> 
<br> 
<br> 
<br> 
<a href="index.php"> menu principal volver</a>
</body>
</html>
