<?php
function conectarPorRol($rol = null) {
    // Configura los datos de tu servidor
    $host = "localhost";
    $usuario = "root";
    $password = "";
    $base_datos = "viajes"; // Asegúrate que sea exactamente igual al nombre en phpMyAdmin

    // Crear conexión
    $conexion = new mysqli($host, $usuario, $password, $base_datos);

    // Verificar si hay error
    if ($conexion->connect_error) {
        die("❌ Error al conectar con la base de datos: " . $conexion->connect_error);
    }

    return $conexion;
}
?>

