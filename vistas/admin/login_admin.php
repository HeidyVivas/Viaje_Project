<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar sesión — Administrador</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">

  <div class="bg-white p-8 rounded-2xl shadow-md w-96 text-center">
    <h2 class="text-xl font-semibold mb-6">Iniciar Sesión — <span class="text-gray-800">Administrador</span></h2>

    <form action="../../includes/validar_login.php" method="POST" class="space-y-4">
      <input type="hidden" name="rol" value="admin">
      <input name="correo" type="email" placeholder="Correo" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-gray-500">
      <input name="contrasena" type="password" placeholder="Contraseña" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-gray-500">
      <button type="submit" class="w-full py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition">Entrar</button>
    </form>

   <a href="http://localhost/viaje_project/" class="block mt-3 text-gray-500 text-sm hover:underline">Volver</a>
  </div>

</body>
</html>
