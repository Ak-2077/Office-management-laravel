@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Employees</h2>

        <a href="{{ route('employees.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Employee</a>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 px-4 py-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300" id="employeesTable">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Position</th>
                    <th class="border px-4 py-2">Company</th>
                    <th class="border px-4 py-2">Manager</th>
                    <th class="border px-4 py-2">Country</th>
                    <th class="border px-4 py-2">State</th>
                    <th class="border px-4 py-2">City</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td class="border px-4 py-2">{{ $employee->id }}</td>
                        <td class="border px-4 py-2">{{ $employee->name }}</td>
                        <td class="border px-4 py-2">{{ $employee->email }}</td>
                        <td class="border px-4 py-2">{{ $employee->position }}</td>
                        <td class="border px-4 py-2">{{ $employee->company->name }}</td>
                        <td class="border px-4 py-2">{{ $employee->manager ? $employee->manager->name : 'None' }}</td>
                        <td class="border px-4 py-2">{{ $employee->country }}</td>
                        <td class="border px-4 py-2">{{ $employee->state }}</td>
                        <td class="border px-4 py-2">{{ $employee->city }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('employees.edit', $employee) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                            <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- DataTables CSS + Buttons extension CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

    <!-- jQuery + DataTables + Buttons JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <script>
        $(document).ready(function() {
            $('#employeesTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
@endsection
