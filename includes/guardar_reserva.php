<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "viaje_project";

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
    $destino = $_POST['destino'];

    // Valores temporales
    $usuario_id = 1;
    $viaje_id = 1;

    // Combinar fecha y hora
    $fecha_reserva = $fecha . ' ' . $hora;

    // Total ejemplo
    $precio_por_persona = 50000;
    $total = $cantidad * $precio_por_persona;

    $estado = "";

    // Asegurar tipos numéricos
    $cantidad = (int)$cantidad;
    $total = (int)$total;

    $sql = "INSERT INTO reservas (usuario_id, viaje_id, destino, fecha_reserva, cantidad_personas, total)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conexion2->prepare($sql);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conexion2->error);
    }

    $stmt->bind_param("iissii", $usuario_id, $viaje_id, $destino, $fecha_reserva, $cantidad, $total);

    if ($stmt->execute()) {
        echo "<script>
                alert('✅ Reserva registrada correctamente');
                window.location.href = '/viaje_project/includes/guardar_reserva.php';
              </script>";
    } else {
        echo "Error al guardar la reserva: " . $stmt->error;
    }

    $stmt->close();
}

$conexion2->close();
?>
<a href="http://localhost/viaje_project/">Atrás</a>
