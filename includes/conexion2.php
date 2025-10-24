<?php
// includes/conexion2.php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "viajes_project";

$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conexion->connect_errno) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Establecer codificación UTF-8
$conexion->set_charset("utf8mb4");
?>
