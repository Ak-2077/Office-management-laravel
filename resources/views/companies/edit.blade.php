<!-- resources/views/companies/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Edit Company</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-8">

    <h1 class="text-2xl mb-4">Edit Company</h1>

    <form action="{{ route('companies.update', $company->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">Company Name:</label>
            <input type="text" name="name" class="border p-2 w-full" value="{{ $company->name }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Location:</label>
            <input type="text" name="location" class="border p-2 w-full" value="{{ $company->location }}">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Update</button>
    </form>

</body>
</html>
