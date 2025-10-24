<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Evita errores si los campos no existen
    $correo = $_POST['correo'] ?? null;
    $contrasena = $_POST['contrasena'] ?? null;

    if ($correo && $contrasena) {
        // Aquí tu lógica de validación (consulta a la BD, etc.)
        // Ejemplo básico:
        if ($correo === "admin@gmail.com" && $contrasena === "1234") {
            session_start();
            $_SESSION['usuario'] = "Administrador";
            $_SESSION['rol'] = "admin";
            header("Location: admin.php");
            exit;
        } else {
            echo "<script>alert('Credenciales incorrectas'); window.location='login.html';</script>";
        }
    } else {
        echo "<script>alert('Faltan campos'); window.location='login.html';</script>";
    }
} else {
    // Si se accede directamente sin POST
    header("Location: login.html");
    exit;
}
?>
