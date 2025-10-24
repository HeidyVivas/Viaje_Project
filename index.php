<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Selecciona tu rol</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">

  <div class="bg-white p-8 rounded-2xl shadow-md w-96 text-center">
    <h2 class="text-xl font-semibold mb-6">Selecciona tu rol</h2>

    <div class="space-y-3">
      <a href="vistas/cliente/login_cliente.php"
         class="block w-full bg-sky-600 text-white py-2 rounded-lg hover:bg-sky-700 transition">
        Cliente
      </a>
      <a href="vistas/empleado/login_empleado.php"
         class="block w-full bg-emerald-600 text-white py-2 rounded-lg hover:bg-emerald-700 transition">
        Empleado
      </a>
      <a href="vistas/admin/login_admin.php"
         class="block w-full bg-gray-800 text-white py-2 rounded-lg hover:bg-gray-900 transition">
        Administrador
      </a>
    </div>
  </div>

</body>
</html>
