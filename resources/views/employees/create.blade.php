@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-3xl">
    <h2 class="text-2xl font-bold mb-6">Add New Employee</h2>

    <form action="{{ route('employees.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded shadow">
        @csrf

        <div>
            <label class="block font-semibold mb-1" for="name">Name</label>
            <input type="text" name="name" id="name" 
                class="w-full border border-gray-300 rounded px-3 py-2" value="{{ old('name') }}" required>
            @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1" for="email">Email</label>
            <input type="email" name="email" id="email" 
                class="w-full border border-gray-300 rounded px-3 py-2" value="{{ old('email') }}" required>
            @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1" for="position">Position</label>
            <input type="text" name="position" id="position" 
                class="w-full border border-gray-300 rounded px-3 py-2" value="{{ old('position') }}" required>
            @error('position') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1" for="company_id">Company</label>
            <select name="company_id" id="company_id" 
                class="w-full border border-gray-300 rounded px-3 py-2" required>
                <option value="">-- Select Company --</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
            @error('company_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1" for="manager_id">Manager</label>
            <select name="manager_id" id="manager_id" 
                class="w-full border border-gray-300 rounded px-3 py-2">
                <option value="">-- None --</option>
                @foreach($managers as $manager)
                    <option value="{{ $manager->id }}" {{ old('manager_id') == $manager->id ? 'selected' : '' }}>
                        {{ $manager->name }}
                    </option>
                @endforeach
            </select>
            @error('manager_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Country, State, City simple dropdowns -->
        <div>
            <label class="block font-semibold mb-1" for="country">Country</label>
            <select name="country" id="country" class="w-full border border-gray-300 rounded px-3 py-2" required>
                <option value="">-- Select Country --</option>
                <option value="USA" {{ old('country') == 'USA' ? 'selected' : '' }}>USA</option>
                <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                <option value="UK" {{ old('country') == 'UK' ? 'selected' : '' }}>UK</option>
                <!-- Add more countries as needed -->
            </select>
            @error('country') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1" for="state">State</label>
            <select name="state" id="state" class="w-full border border-gray-300 rounded px-3 py-2" required>
                <option value="">-- Select State --</option>
                <option value="California" {{ old('state') == 'California' ? 'selected' : '' }}>California</option>
                <option value="Maharashtra" {{ old('state') == 'Maharashtra' ? 'selected' : '' }}>Maharashtra</option>
                <option value="London" {{ old('state') == 'London' ? 'selected' : '' }}>London</option>
                <!-- Add more states as needed -->
            </select>
            @error('state') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1" for="city">City</label>
            <select name="city" id="city" class="w-full border border-gray-300 rounded px-3 py-2" required>
                <option value="">-- Select City --</option>
                <option value="Los Angeles" {{ old('city') == 'Los Angeles' ? 'selected' : '' }}>Los Angeles</option>
                <option value="Mumbai" {{ old('city') == 'Mumbai' ? 'selected' : '' }}>Mumbai</option>
                <option value="London City" {{ old('city') == 'London City' ? 'selected' : '' }}>London City</option>
                <!-- Add more cities as needed -->
            </select>
            @error('city') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Employee</button>
        </div>
    </form>
</div>
@endsection
