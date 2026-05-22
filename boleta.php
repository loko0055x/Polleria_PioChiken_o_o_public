<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>PDF con Bootstrap</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilos.css">
    </head>

    <body>
        <div class="container mt-5">
            <h1 class="page-title">Generar PDF con Bootstrap</h1>
            <form action="generar_pdf.php" method="post" target="_blank">
                <button type="submit" class="btn btn-primary" name="generarPdfBtn">Abrir PDF en Nueva Ventana</button>
            </form>
            <form action="descargar_pdf.php" method="post">
                <button type="submit" class="btn btn-primary" name="generarPdfBtn">Descargar PDF</button>
            </form>
            <iframe src="generar_pdf.php" width="100%" height="500px"></iframe>

        </div>

        <!-- Bootstrap Scripts (jQuery y Popper.js) -->
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>

</html>

