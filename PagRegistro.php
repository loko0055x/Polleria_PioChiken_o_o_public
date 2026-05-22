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
        ?>
    <center> 
        <form action="controller/ClienteController.php" method="post">
            <br>
            <label> Digita tu Dni</label>
            <br>
            <input type="text" name="txtdni">
            <br>
            <label> Digita tu nombre</label>
            <br>
            <input type="text" name="txtnom">
            <br>

            <label> Digita tu apellido</label>
            <br>
            <input type="text" name="txtape">
            <br>
            <label> Digita tu correo</label>
            <br>
            <input type="text" name="txtcorreo">
            <br>
            <label> Digita tu telefono</label>
            <br>
            <input type="text" name="txttelef">
            <br>
            <label> Digita tu contra</label>
            <br>
            <input type="text" name="txtcontra">
            <br>
            <label></label>
            <br>
            <input type="submit" name="btnagregar">
            <br>
        </form>
    </center>
</body>

</html>
