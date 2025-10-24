<?php
// reservas/ver_reservas.php
include('../includes/conexion2.php');
session_start();

// Si quieres filtrar por usuario logueado:
$filtrar_por_usuario = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 0;

if ($filtrar_por_usuario > 0) {
    $stmt = $conexion->prepare("
        SELECT r.id, u.nombre AS cliente, v.destino, r.cantidad_personas, r.total, r.fecha_reserva
        FROM reservas r
        JOIN usuarios u ON r.usuario_id = u.id
        JOIN viajes v ON r.viaje_id = v.id
        WHERE u.id = ?
        ORDER BY r.fecha_reserva DESC
    ");
    $stmt->bind_param("i", $filtrar_por_usuario);
    $stmt->execute();
    $res = $stmt->get_result();
} else {
    $res = $conexion->query("
        SELECT r.id, u.nombre AS cliente, v.destino, r.cantidad_personas, r.total, r.fecha_reserva
        FROM reservas r
        JOIN usuarios u ON r.usuario_id = u.id
        JOIN viajes v ON r.viaje_id = v.id
        ORDER BY r.fecha_reserva DESC
    ");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ver Reservas</title>
</head>
<body>
  <h1>Reservas</h1>
  <table border="1" cellpadding="6">
    <tr>
      <th>Cliente</th>
      <th>Destino</th>
      <th>Cantidad</th>
      <th>Total</th>
      <th>Fecha reserva</th>
    </tr>
    <?php
    if ($res && $res->num_rows > 0) {
        while ($fila = $res->fetch_assoc()) {
            echo "<tr>
                <td>{$fila['cliente']}</td>
                <td>{$fila['destino']}</td>
                <td>{$fila['cantidad_personas']}</td>
                <td>$" . number_format($fila['total'], 2, ',', '.') . "</td>
                <td>{$fila['fecha_reserva']}</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No hay reservas.</td></tr>";
    }
    ?>
  </table>
</body>
</html>
