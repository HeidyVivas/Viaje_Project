<?php
session_start();
include 'conexion.php';

// Datos del formulario
$nombre = $_POST['nombre'] ?? '';
$correo = $_POST['correo'] ?? '';
$contrasena = $_POST['contrasena'] ?? '';
$id_rol = 3; // Siempre registra como cliente

// Validación básica
if (empty($nombre) || empty($correo) || empty($contrasena)) {
    echo "<script>alert('Por favor completa todos los campos.'); window.history.back();</script>";
    exit;
}

// Encriptar la contraseña
$contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);

// 🔹 Usamos la conexión según el rol del usuario
$conexion = conectarPorRol($id_rol);

// Verificar si se conectó correctamente
if (!$conexion) {
    die("Error al conectar con la base de datos.");
}

// Consulta SQL
$sql = "INSERT INTO usuarios (nombre, correo, contrasena, id_rol) VALUES (?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);

if (!$stmt) {
    die("Error al preparar la consulta: " . $conexion->error);
}

// Asignar parámetros
$stmt->bind_param("sssi", $nombre, $correo, $contrasenaHash, $id_rol);
