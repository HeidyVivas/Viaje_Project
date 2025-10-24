<?php
// reservas/reservar.php
include('../includes/conexion2.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reservar viaje</title>
</head>
<body>
  <h1>Reservar un viaje</h1>

  <?php
  $query = $conexion->query("SELECT id, destino, fecha_salida, fecha_regreso, precio, cupos FROM viajes");
  if ($query && $query->num_rows > 0) {
      echo "<form method='post' action='../includes/nueva_reserva.php'>";
      echo "<label>Nombre: <input type='text' name='nombre' required></label><br>";
      echo "<label>Correo: <input type='email' name='correo' required></label><br>";
      echo "<label>Viaje: <select name='viaje_id' required>";
      while ($row = $query->fetch_assoc()) {
          echo "<option value='{$row['id']}'>{$row['destino']} | Salida: {$row['fecha_salida']} | Regreso: {$row['fecha_regreso']} | Precio: {$row['precio']} | Cupos: {$row['cupos']}</option>";
      }
      echo "</select></label><br>";
      echo "<label>Cantidad personas: <input type='number' name='cantidad_personas' min='1' value='1' required></label><br>";
      echo "<button type='submit'>Reservar</button>";
      echo "</form>";
  } else {
      echo "<p>No hay viajes disponibles por ahora.</p>";
  }
  ?>

</body>
</html>
