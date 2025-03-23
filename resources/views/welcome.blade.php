<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Asistencia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function actualizarHora() {
            const ahora = new Date();
            const hora = ahora.toLocaleTimeString('es-ES', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
            document.getElementById('hora-actual').textContent = hora;
        }
        setInterval(actualizarHora, 1000); // Actualiza la hora cada segundo
    </script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

    <!-- Botón de Login en la esquina superior derecha -->
    <a href="{{ url('/admin/login') }}" class="absolute top-4 right-4 bg-gray-800 text-white px-4 py-2 rounded shadow-md hover:bg-gray-900">
        Login Admin
    </a>

    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <div class="flex flex-col items-center mb-4">
            <img src="../qchuzos.jpg" alt="Usuario" class="rounded-full w-24 h-24 object-cover">
            <h1 id="hora-actual" class="text-3xl font-bold mt-4"></h1> <!-- Hora en grande -->
        </div>
        <h2 class="text-center text-2xl font-semibold mb-4">Control de Asistencia</h2>

        @if(session('success'))
            <p class="bg-green-500 text-white p-2 text-center mb-4 rounded">{{ session('success') }}</p>
        @endif

        <form action="{{ url('/marcar-asistencia') }}" method="POST" class="space-y-4">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre" class="w-full p-2 border rounded" required>
            <input type="text" name="cedula" placeholder="Cédula" class="w-full p-2 border rounded" required>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Marcar Entrada/Salida</button>
        </form>
    </div>

    <script>
        actualizarHora(); // Inicializar la hora al cargar la página
    </script>
</body>
</html>
