<?php
session_start();
if(!isset($_SESSION['usuario'])) {
  header("Location: ../cliente/login_cliente.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel Cliente</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50 p-6">
  <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-md p-6">
    <header class="flex justify-between items-center mb-6">
      <div>
        <h1 class="text-2xl font-semibold">Panel del Cliente</h1>
        <p class="text-sm text-gray-500">Bienvenido, <?php echo $_SESSION['usuario']; ?></p>
      </div>
      <a href="cerrar_sesion.php" class="text-gray-500 hover:underline text-sm">Cerrar sesión</a>
    </header>

    <div class="text-center">
      <p class="mb-4 text-gray-600">Puedes realizar una reserva de viaje.</p>
      <a href="/viaje_project/reservas/nueva_reserva.php" class="px-4 py-2 bg-sky-600 text-white rounded-md shadow hover:bg-sky-700">Hacer una reserva</a>
    </div>
  </div>
</body>
</html>
