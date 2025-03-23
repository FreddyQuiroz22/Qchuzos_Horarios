<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow-lg">
        <h2 class="text-3xl font-bold text-center mb-4">Panel de Administración</h2>

        <!-- Mostrar mensaje de bienvenida -->
        <p class="text-lg font-semibold mb-2">Bienvenido, {{ Auth::user()->nombre }}.</p>

        <!-- Formulario para logout -->
        <form action="{{ route('logout') }}" method="POST" class="mb-4">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Cerrar sesión</button>
        </form>

        <form action="{{ url('/admin/filtro') }}" method="POST" class="mb-4 flex space-x-4">
            @csrf
            <input type="text" name="nombre" placeholder="Buscar por Nombre" class="p-2 border rounded">
            <input type="text" name="cedula" placeholder="Buscar por Cédula" class="p-2 border rounded">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filtrar</button>
        </form>

        <p class="text-lg font-semibold mb-2">Total Horas Trabajadas: <span class="text-blue-500">{{ $totalHoras }}</span></p>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Nombre</th>
                    <th class="border p-2">Cédula</th>
                    <th class="border p-2">Fecha</th>
                    <th class="border p-2">Hora</th>
                    <th class="border p-2">Tipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registros as $registro)
                    <tr class="text-center">
                        <td class="border p-2">{{ $registro->nombre }}</td>
                        <td class="border p-2">{{ $registro->cedula }}</td>
                        <td class="border p-2">{{ $registro->fecha }}</td>
                        <td class="border p-2">{{ $registro->hora }}</td>
                        <td class="border p-2">{{ $registro->tipo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
