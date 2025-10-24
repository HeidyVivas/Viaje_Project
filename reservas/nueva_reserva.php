<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva reserva</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Nueva reserva</h2>

        <form action="../includes/guardar_reserva.php" method="POST" class="space-y-4">
            <!-- Nombre -->
            <input 
                type="text" 
                name="nombre" 
                placeholder="Nombre" 
                required 
                class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >

            <!-- Fecha -->
            <input 
                type="date" 
                name="fecha" 
                required 
                class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >

            <!-- Hora -->
            <input 
                type="time" 
                name="hora" 
                required 
                class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >

            <!-- Cantidad de personas -->
            <input 
                type="number" 
                name="cantidad" 
                min="1" 
                required 
                placeholder="Cantidad de personas"
                class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >

            <!-- Teléfono -->
            <input 
                type="text" 
                name="telefono" 
                placeholder="Teléfono" 
                required 
                class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >

            <!-- Botones -->
            <div class="flex justify-between pt-4">
                <button 
                    type="reset"
                    class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-lg transition-colors duration-200"
                >
                    Cancelar
                </button>
                <button 
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors duration-200"
                >
                    Guardar
                </button>
            </div>
        </form>
    </div>

</body>
</html>
