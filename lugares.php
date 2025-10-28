<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver lugares - Sistema de Reservas</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-blue-100 to-white min-h-screen">

  <!-- Encabezado -->
  <header class="bg-blue-500 text-white py-5 shadow-md">
    <h1 class="text-3xl font-bold text-center">Lugares turísticos de Colombia</h1>
    <p class="text-center text-blue-200">Explora la cultura, historia y belleza natural de cada destino</p>
  </header>

  <!-- Contenedor de tarjetas -->
  <main class="p-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl mx-auto">

    <!-- Cartagena -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition">
      <img src="https://guiaviajarmelhor.com.br/wp-content/uploads/2022/06/cartagena-quando-ir.jpeg" alt="Cartagena" class="w-full h-48 object-cover">
      <div class="p-4">
        <h2 class="text-xl font-bold text-blue-700">Cartagena</h2>
        <p class="text-gray-600 text-sm mt-2">
          Ciudad colonial amurallada frente al mar Caribe. Su arquitectura, música y gastronomía reflejan una rica mezcla cultural afrocaribeña.
        </p>
      </div>
    </div>

    <!-- Medellín -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition">
      <img src="https://cdn.getyourguide.com/img/location/5cced3e295e02.jpeg/88.jpg" alt="Medellín" class="w-full h-48 object-cover">
      <div class="p-4">
        <h2 class="text-xl font-bold text-blue-700">Medellín</h2>
        <p class="text-gray-600 text-sm mt-2">
          Conocida como la "Ciudad de la Eterna Primavera", destaca por su innovación, arte urbano y la calidez de su gente.
        </p>
      </div>
    </div>

    <!-- Santa Marta -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition">
      <img src="https://www.labitacoradecarlosyeli.com/wp-content/uploads/2021/07/2-playas-imperdibles-si-estas-en-Santa-Marta-Colombia-Cabezote-1.jpg" alt="Santa Marta" class="w-full h-48 object-cover">
      <div class="p-4">
        <h2 class="text-xl font-bold text-blue-700">Santa Marta</h2>
        <p class="text-gray-600 text-sm mt-2">
          Rodeada por la Sierra Nevada y el mar Caribe, combina playas, naturaleza y pueblos indígenas llenos de tradición.
        </p>
      </div>
    </div>

    <!-- San Andrés -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition">
      <img src="https://conocedores.com/wp-content/uploads/2020/11/isla-san-andres-05112020.jpg" alt="San Andrés" class="w-full h-48 object-cover">
      <div class="p-4">
        <h2 class="text-xl font-bold text-blue-700">San Andrés</h2>
        <p class="text-gray-600 text-sm mt-2">
          Isla paradisíaca de aguas turquesas, famosa por su “mar de siete colores”, su cultura raizal y su ambiente caribeño.
        </p>
      </div>
    </div>

  </main>

  <!-- Botón de regreso -->
  <div class="text-center mt-6">
    <a href="http://localhost/viaje_project/" class="inline-block px-6 py-2 bg-blue-600 text-white rounded-full shadow hover:bg-blue-800 transition">
      ⬅️ Volver al inicio
    </a>
  </div>

</body>
</html>
