<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "viajes_project";

$conexion2 = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conexion2->connect_error) {
    die("Error de conexión: " . $conexion2->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $cantidad = $_POST['cantidad'];
    $telefono = $_POST['telefono'];

    // Valores temporales
    $usuario_id = 1;
    $viaje_id = 1;

    // Combinar fecha y hora
    $fecha_reserva = $fecha . ' ' . $hora;

    // Total ejemplo
    $precio_por_persona = 50000;
    $total = $cantidad * $precio_por_persona;

    $estado = "pendiente";

    $sql = "INSERT INTO reservas (usuario_id, viaje_id, fecha_reserva, cantidad_personas, total, estado)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conexion2->prepare($sql);
    $stmt->bind_param("iisiis", $usuario_id, $viaje_id, $fecha_reserva, $cantidad, $total, $estado);

    if ($stmt->execute()) {
        echo "<script>
                alert('✅ Reserva registrada correctamente');
                window.location.href = '/viaje_project/includes/guardar_reserva.php';
              </script>";
    } else {
        echo "Error al guardar la reserva: " . $conexion2->error;
    }

    $stmt->close();
}

$conexion2->close();
?>


