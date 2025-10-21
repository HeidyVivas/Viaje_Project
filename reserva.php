<?php
session_start();
include 'conexion.php';

// Verificar si el usuario inició sesión


// Obtener datos
$id_usuario = $_SESSION['id_usuario']; // de la sesión
$id_viaje = $_POST['id_viaje'] ?? '';
$fecha_reserva = date('Y-m-d');
$estado = 'pendiente';

// Validar
if (empty($id_viaje)) {
    echo "<script>alert('No se recibió el ID del viaje.'); window.history.back();</script>";
    exit;
}

// Conectar
$conexion = conectarPorRol(3); // cliente

// Preparar sentencia SQL
$sql = "INSERT INTO reservas (id_usuario, id_viaje, fecha_reserva, estado) VALUES (?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);

if (!$stmt) {
    die("Error al preparar la consulta: " . $conexion->error);
}

// Asignar valores
$stmt->bind_param("iiss", $id_usuario, $id_viaje, $fecha_reserva, $estado);

// Ejecutar
if ($stmt->execute()) {
    echo "<script>
        alert('✅ Reserva realizada con éxito.');
        window.location='../reservas.html';
    </script>";
} else {
    echo "<script>
        alert('❌ Error al guardar la reserva: " . $stmt->error . "');
        window.history.back();
    </script>";
}

// Cerrar conexión
$stmt->close();
$conexion->close();
?>




