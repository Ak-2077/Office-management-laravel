<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Office Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow p-4 mb-6">
        <div class="container mx-auto flex space-x-4">
            <a href="{{ route('companies.index') }}" class="text-blue-600 font-semibold">Companies</a>
            <a href="{{ route('employees.index') }}" class="text-blue-600 font-semibold">Employees</a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>