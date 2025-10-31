<?php
session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: login_admin.php");
    exit;
}
echo "<h2>Hola, " . $_SESSION['nombre'] . " </h2>";
echo "<p>Has iniciado sesión como <strong>Administrador</strong></p>";
echo "<a href='cerrar_sesion.php'>Cerrar sesión</a>";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Reservas</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-6">

  <div class="w-full max-w-md space-y-5">

    <!-- Filtros y botón -->
    <div class="flex items-center justify-between">
      <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="todas">Todas</option>
        <option value="pendientes">Pendientes</option>
        <option value="confirmadas">Confirmadas</option>
        <option value="canceladas">Canceladas</option>
      </select>
      
    </div>

    <!-- Tarjeta de estadísticas rápidas -->
    <div class="bg-white shadow-sm rounded-xl p-5 border border-gray-100">
      <h2 class="text-gray-800 font-semibold mb-4">Estadísticas rápidas</h2>
      <div class="grid grid-cols-2 gap-4 text-center">
        <div class="bg-gray-50 rounded-lg p-3">
          <p class="text-gray-500 text-sm">Total</p>
          <p class="text-lg font-semibold text-gray-800">2</p>
        </div>
        <div class="bg-gray-50 rounded-lg p-3">
          <p class="text-gray-500 text-sm">Pendientes</p>
          <p class="text-lg font-semibold text-gray-800">1</p>
        </div>
        <div class="bg-gray-50 rounded-lg p-3">
          <p class="text-gray-500 text-sm">Confirmadas</p>
          <p class="text-lg font-semibold text-gray-800">1</p>
        </div>
        <div class="bg-gray-50 rounded-lg p-3">
          <p class="text-gray-500 text-sm">Canceladas</p>
          <p class="text-lg font-semibold text-gray-800">0</p>
        </div>
      </div>
    </div>

   <a href="http://localhost/viaje_project/" class="block mt-3 text-gray-500 text-sm hover:underline">Volver</a>
      
  

  </div>

</body>
</html>
