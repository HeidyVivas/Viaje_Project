<?php
include(__DIR__ . "/../includes/conexion2.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') die("Acceso inválido.");

// Reusa la lógica de includes/guardar_reserva.php o simplemente incluye ese archivo:
include(__DIR__ . "/../includes/guardar_reserva.php");
?>
