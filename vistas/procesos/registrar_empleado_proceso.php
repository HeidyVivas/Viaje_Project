<?php
include(__DIR__ . "/../../includes/conexion2.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acceso inválido.");
}

$nombre = trim($_POST['nombre'] ?? '');
$correo = trim($_POST['correo'] ?? '');
$telefono = trim($_POST['telefono'] ?? '');
$contrasena = trim($_POST['contrasena'] ?? '');

if ($nombre === '' || $correo === '' || $telefono === '' || $contrasena === '') {
    die("Faltan datos.");
}

// Verificar si el correo ya existe
$stmt = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    die("El correo ya está registrado.");
}

// Encriptar contraseña
$hash = password_hash($contrasena, PASSWORD_BCRYPT);

// Insertar nuevo empleado con rol_id = 2
$ins = $conexion->prepare("INSERT INTO usuarios (nombre, correo, telefono, contraseña, rol_id, fecha_registro)
                           VALUES (?, ?, ?, ?, 2, NOW())");
$ins->bind_param("ssss", $nombre, $correo, $telefono, $hash);

if ($ins->execute()) {
    header("Location: ../empleado/login_empleado.php");
    exit;
} else {
    die("Error al guardar el empleado: " . $conexion->error);
}
?>

