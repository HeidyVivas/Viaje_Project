<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro — Cliente</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-[url(https://encolombia.com/wp-content/uploads/2013/02/San-Andres-Colombia.jpeg)]">

  <div class="bg-white p-8 rounded-2xl shadow-md w-96 text-center">
    <h2 class="text-xl font-semibold mb-6">Registro — <span class="text-sky-600">cliente</span></h2>

    <form action="../procesos/registrar_cliente_proceso.php" method="POST" class="space-y-4">
      <input name="nombre" type="text" placeholder="Nombre completo" required
             class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-sky-500">
      <input name="correo" type="email" placeholder="Correo" required
             class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-sky-500">
      <input name="telefono" type="text" placeholder="Teléfono" required
             class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-sky-500">
      <input name="contrasena" type="password" placeholder="Contraseña" required
             class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-sky-500">

      <button type="submit"
              class="w-full py-3 bg-sky-600 text-white rounded-lg hover:bg-sky-700 transition">
        Registrarse
      </button>
    </form>

    <p class="mt-4 text-sm text-gray-600">
      ¿Ya tienes cuenta?
      <a href="login_cliente.php" class="text-sky-600 hover:underline">Inicia sesión</a>
    </p>

    <a href="../index.php" class="block mt-3 text-gray-500 text-sm hover:underline">Volver</a>
  </div>

</body>
</html>
