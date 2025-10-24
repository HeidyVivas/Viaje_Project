<?php
include(__DIR__ . "/../../includes/conexion2.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') die("Acceso inválido.");

$nombre = trim($_POST['nombre'] ?? '');
$correo = trim($_POST['correo'] ?? '');
$contraseña = trim($_POST['contrasena'] ?? '');

if ($nombre === '' || $correo === '' || $contraseña === '') {
    die("Faltan datos.");
}

$stmt = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
if ($stmt->get_result()->num_rows > 0) {
    die("Correo ya registrado.");
}
$hash = password_hash($contraseña, PASSWORD_BCRYPT);    
$ins = $conexion->prepare("INSERT INTO usuarios (nombre, correo, contraseña, rol_id) VALUES (?, ?, ?, 3)");
$ins->bind_param("sss", $nombre, $correo, $hash);
if ($ins->execute()) {
    header("Location: ../cliente/login_cliente.php");
    exit;
} else {
    die("Error al guardar.");
}
?>
