<!-- resources/views/companies/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Add Company</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-8">

    <h1 class="text-2xl mb-4">Add Company</h1>

    <form action="{{ route('companies.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Company Name:</label>
            <input type="text" name="name" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Location:</label>
            <input type="text" name="location" class="border p-2 w-full">
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2">Save</button>
    </form>

</body>
</html>
