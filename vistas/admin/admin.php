<?php
session_start();
include('../../includes/conexion2.php');

// Verificar sesión de admin (opcional)
if (!isset($_SESSION['nombre'])) {
    header("Location: login_admin.php");
    exit;
}

// Cambiar estado o eliminar
if (isset($_GET['accion'], $_GET['id'])) {
    $id = intval($_GET['id']);
    $accion = $_GET['accion'];

    if ($accion === 'confirmar') {
        $conexion->query("UPDATE reservas SET estado='Confirmada' WHERE id=$id");
    } elseif ($accion === 'cancelar') {
        $conexion->query("UPDATE reservas SET estado='Cancelada' WHERE id=$id");
    } elseif ($accion === 'eliminar') {
        $conexion->query("DELETE FROM reservas WHERE id=$id");
    }

    header("Location: admin.php");
    exit;
}

// Consultar reservas
$sql = "
    SELECT r.id, u.nombre AS cliente, u.telefono, v.destino, r.cantidad_personas,
           r.total, r.fecha_reserva, r.estado
    FROM reservas r
    JOIN usuarios u ON r.usuario_id = u.id
    JOIN viajes v ON r.viaje_id = v.id
    ORDER BY r.fecha_reserva DESC
";
$reservas = $conexion->query($sql);

// Contadores rápidos
$total = $conexion->query("SELECT COUNT(*) AS c FROM reservas")->fetch_assoc()['c'];
$pendientes = $conexion->query("SELECT COUNT(*) AS c FROM reservas WHERE estado='Pendiente'")->fetch_assoc()['c'];
$confirmadas = $conexion->query("SELECT COUNT(*) AS c FROM reservas WHERE estado='Confirmada'")->fetch_assoc()['c'];
$canceladas = $conexion->query("SELECT COUNT(*) AS c FROM reservas WHERE estado='Cancelada'")->fetch_assoc()['c'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel de Reservas</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

  <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-md p-6">
    <h2 class="text-2xl font-semibold mb-4">📋 Sistema de Reservas — Panel Admin</h2>

    <table class="w-full border-collapse border border-gray-300 text-sm">
      <thead class="bg-gray-200">
        <tr>
          <th class="border border-gray-300 px-2 py-1">Cliente</th>
          <th class="border border-gray-300 px-2 py-1">Destino</th>
          <th class="border border-gray-300 px-2 py-1">Personas</th>
          <th class="border border-gray-300 px-2 py-1">Total</th>
          <th class="border border-gray-300 px-2 py-1">Fecha</th>
          <th class="border border-gray-300 px-2 py-1">Estado</th>
          <th class="border border-gray-300 px-2 py-1">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($r = $reservas->fetch_assoc()): ?>
        <tr class="text-center">
          <td class="border border-gray-300 px-2 py-1"><?= htmlspecialchars($r['cliente']) ?></td>
          <td class="border border-gray-300 px-2 py-1"><?= htmlspecialchars($r['destino']) ?></td>
          <td class="border border-gray-300 px-2 py-1"><?= $r['cantidad_personas'] ?></td>
          <td class="border border-gray-300 px-2 py-1">$<?= number_format($r['total'], 0, ',', '.') ?></td>
          <td class="border border-gray-300 px-2 py-1"><?= $r['fecha_reserva'] ?></td>
          <td class="border border-gray-300 px-2 py-1">
            <?php
              $color = match($r['estado']) {
                  'Confirmada' => 'bg-green-100 text-green-800',
                  'Cancelada' => 'bg-red-100 text-red-800',
                  default => 'bg-yellow-100 text-yellow-800'
              };
            ?>
            <span class="px-2 py-1 rounded <?= $color ?>"><?= $r['estado'] ?></span>
          </td>
          <td class="border border-gray-300 px-2 py-1 space-x-1">
            <a href="?accion=confirmar&id=<?= $r['id'] ?>" class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded text-xs">Confirmar</a>
            <a href="?accion=cancelar&id=<?= $r['id'] ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-xs">Cancelar</a>
            <a href="?accion=eliminar&id=<?= $r['id'] ?>" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-xs">Eliminar</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

    <div class="mt-6 grid grid-cols-4 gap-4 text-center">
      <div class="bg-gray-50 p-3 rounded-lg shadow">
        <p class="text-gray-600 text-sm">Total</p>
        <p class="text-lg font-bold"><?= $total ?></p>
      </div>
      <div class="bg-gray-50 p-3 rounded-lg shadow">
        <p class="text-gray-600 text-sm">Pendientes</p>
        <p class="text-lg font-bold"><?= $pendientes ?></p>
      </div>
      <div class="bg-gray-50 p-3 rounded-lg shadow">
        <p class="text-gray-600 text-sm">Confirmadas</p>
        <p class="text-lg font-bold"><?= $confirmadas ?></p>
      </div>
      <div class="bg-gray-50 p-3 rounded-lg shadow">
        <p class="text-gray-600 text-sm">Canceladas</p>
        <p class="text-lg font-bold"><?= $canceladas ?></p>
      </div>
    </div>
  </div>

</body>
</html>
