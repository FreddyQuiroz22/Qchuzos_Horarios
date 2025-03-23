<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 p-6">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-4">Iniciar sesión</h2>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold text-gray-700">Correo electrónico</label>
                <input type="email" id="email" name="email" class="w-full p-2 border rounded mt-2" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" class="w-full p-2 border rounded mt-2" required>
            </div>

            @error('email')
                <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
            @enderror

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded mt-4">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>
