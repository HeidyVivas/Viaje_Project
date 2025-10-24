<?php
// includes/validar_login.php
session_start();
include(__DIR__ . "/conexion2.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Acceso inválido.");
}

$correo = trim($_POST['correo'] ?? '');
$contrasena = $_POST['contrasena'] ?? '';
$rol = trim($_POST['rol'] ?? '');

if ($correo === '' || $contrasena === '' || $rol === '') {
    die("Faltan datos para el inicio de sesión.");
}

// Validar rol permitido
$roles_permitidos = ['cliente', 'empleado', 'admin'];
if (!in_array($rol, $roles_permitidos)) {
    die("Rol inválido.");
}

// Buscar usuario por correo y rol
$stmt = $conexion->prepare("SELECT id, nombre, contraseña, rol_id FROM usuarios WHERE correo = ?");
if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conexion->error);
}
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<script>alert('Correo o contraseña incorrectos'); history.back();</script>";
    exit;
}

$user = $result->fetch_assoc();

// Verificar contraseña (las contraseñas guardadas en la BD están con bcrypt $2y$...)
if (!password_verify($contrasena, $user['contraseña'])) {
    echo "<script>alert('Correo o contraseña incorrectos'); history.back();</script>";
    exit;
}

// Verificar que el rol del usuario coincida con lo que seleccionó (opcional, según tu lógica)
$rol_id = (int)$user['rol_id'];
// Opcional: mapear rol_id a nombre si lo deseas. Para seguridad simple, usaremos la selección de rol para redirigir.
$_SESSION['user_id'] = $user['id'];
$_SESSION['nombre'] = $user['nombre'];
$_SESSION['correo'] = $correo;

// Redirección según rol seleccionado por el usuario
// Puedes ajustar a rutas concretas de tus vistas: e.g., vistas/cliente/cliente.php
switch ($rol) {
    case 'admin':
        header("Location: ../vistas/admin/admin.php");
        break;
    case 'empleado':
        header("Location: ../vistas/empleado/empleado.php");
        break;
    case 'cliente':
    default:
        header("Location: ../vistas/cliente/cliente.php");
        break;
}
exit;
?>
    