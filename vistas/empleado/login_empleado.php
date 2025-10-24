<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar sesión — Empleado</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">

  <div class="bg-white p-8 rounded-2xl shadow-md w-96 text-center">
    <h2 class="text-xl font-semibold mb-6">Iniciar Sesión — <span class="text-emerald-600">Empleado</span></h2>

    <form action="../../includes/validar_login.php" method="POST" class="space-y-4">
      <input type="hidden" name="rol" value="empleado">
      <input name="correo" type="email" placeholder="Correo" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-emerald-500">
      <input name="contrasena" type="password" placeholder="Contraseña" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-emerald-500">
      <button type="submit" class="w-full py-3 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition">Entrar</button>
    </form>

    <p class="mt-4 text-sm text-gray-600">
      ¿No tienes cuenta?
      <a href="registrar_empleado.php" class="text-emerald-600 hover:underline">Regístrate</a>
    </p>

    <a href="../../index.php" class="block mt-3 text-gray-500 text-sm hover:underline">Volver</a>
  </div>

</body>
</html>
