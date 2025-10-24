<?php
// registrar.php (reemplazar contenido actual)
include('includes/conexion2.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    // Si quieres mostrar formulario aquí, lo dejas en HTML; este archivo asume que el formulario POST se envía aquí.
    die("Acceso inválido.");
}

$nombre = trim($_POST['nombre'] ?? '');
$correo = trim($_POST['correo'] ?? '');
$contraseña = trim($_POST['contraseña'] ?? '');
$rol_id = intval($_POST['rol_id'] ?? 3); // por defecto cliente

if ($nombre === '' || $correo === '' || $contraseña === '') {
    echo "<h3>❌ Todos los campos son obligatorios.</h3>";
    exit;
}

// Verificar que el correo no exista ya
$stmt = $conexion->prepare("SELECT id FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$res = $stmt->get_result();
if ($res->num_rows > 0) {
    echo "<h3>❌ Ese correo ya está registrado.</h3>";
    exit;
}

// Hashear contraseña
$hash = password_hash($contraseña, PASSWORD_BCRYPT);

// Insertar usuario
$ins = $conexion->prepare("INSERT INTO usuarios (nombre, correo, contraseña, telefono, rol_id) VALUES (?, ?, ?, NULL, ?)");
if (!$ins) {
    die("Error en preparación: " . $conexion->error);
}
$ins->bind_param("sssi", $nombre, $correo, $hash, $rol_id);

if ($ins->execute()) {
    echo "<h3>✅ Registro exitoso. Puedes iniciar sesión.</h3>";
    echo "<a href='login.php'>Ir a iniciar sesión</a>";
} else {
    echo "<h3>❌ Error al registrar usuario.</h3>";
}
?>
