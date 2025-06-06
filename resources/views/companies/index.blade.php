<!-- resources/views/companies/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Companies</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-8">

    <h1 class="text-2xl mb-4">Companies</h1>

    <a href="{{ route('companies.create') }}" class="bg-blue-500 text-white px-4 py-2 mb-4 inline-block">Add Company</a>

    @if(session('success'))
        <div class="text-green-500 mb-4">{{ session('success') }}</div>
    @endif

    <table class="table-auto w-full border">
        <thead>
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Location</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
                <tr>
                    <td class="border px-4 py-2">{{ $company->id }}</td>
                    <td class="border px-4 py-2">{{ $company->name }}</td>
                    <td class="border px-4 py-2">{{ $company->location }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('companies.edit', $company->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
