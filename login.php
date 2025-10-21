<?php
session_start();
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = $_POST["correo"] ?? '';
    $contrasena = $_POST["contrasena"] ?? '';

    if (empty($correo) || empty($contrasena)) {
        die("Por favor ingrese correo y contraseña.");
    }

    // Conexión con el rol admin (puede leer todos los usuarios)
    $conexion = conectarPorRol(1);

    $sql = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($contrasena, $usuario["contrasena"])) {
            $_SESSION["id_usuario"] = $usuario["id_usuario"];
            $_SESSION["nombre"] = $usuario["nombre"];
            $_SESSION["rol"] = $usuario["id_rol"];

            // Redirección según rol
            switch ($usuario["id_rol"]) {
                case 1:
                    header("Location: ../html/admin_dashboard.html");
                    break;
                case 2:
                    header("Location: ../html/empleado_dashboard.html");
                    break;
                case 3:
                    header("Location: ../html/cliente_dashboard.php");
                    break;
            }
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    $stmt->close();
    $conexion->close();
}
?>
