<?php
function connectToDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "Php_Proyecto_polleria_O_O";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    return $conn;
}
