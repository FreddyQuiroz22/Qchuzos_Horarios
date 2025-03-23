<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-center text-2xl font-semibold mb-6">Login Administrador</h2>

        @if(session('error'))
            <p class="bg-red-500 text-white p-2 text-center mb-4 rounded">{{ session('error') }}</p>
        @endif

        <form action="{{ url('/admin/login') }}" method="POST" class="space-y-4">
            @csrf
            <input type="email" name="email" placeholder="Correo Electrónico" class="w-full p-2 border rounded" required>
            <input type="password" name="password" placeholder="Contraseña" class="w-full p-2 border rounded" required>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Iniciar Sesión</button>
        </form>

        <a href="{{ url('/') }}" class="block text-center text-gray-600 mt-4 hover:underline">Volver al Inicio</a>
    </div>
</body>
</html>
