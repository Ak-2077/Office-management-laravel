<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmployeeController extends Controller
{
    // Show all employees (index page)
    public function index()
    {
        $employees = Employee::with('company', 'manager')->get();
        return view('employees.index', compact('employees'));
    }

    // Show the form to create a new employee
    public function create()
    {
        // Fetch countries from API
        $response = Http::get('https://restcountries.com/v3.1/all');

        // Check if response is OK and is array
        if ($response->ok() && is_array($response->json())) {

            // Transform the response to get only name and 2-letter code, sorted by name
            $countries = collect($response->json())
                ->filter(function ($country) {
                    return isset($country['name']['common'], $country['cca2']);
                })
                ->sortBy(fn($c) => $c['name']['common'])
                ->map(function ($country) {
                    return [
                        'name' => $country['name']['common'],
                        'code' => $country['cca2'],  // 2-letter country code
                    ];
                })
                ->values(); // reset keys

        } else {
            // If API failed → fallback to one country: India
            $countries = collect([
                ['name' => 'India', 'code' => 'IN'],
            ]);
        }

        $companies = Company::all();
        $managers = Employee::all(); // self reference

        return view('employees.create', compact('companies', 'managers', 'countries'));
    }

    // Store new employee in database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'position' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'manager_id' => 'nullable|exists:employees,id',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee created successfully!');
    }

    // Show the form to edit an employee
    public function edit(Employee $employee)
    {
        // Fetch countries again for edit
        $response = Http::get('https://restcountries.com/v3.1/all');

        if ($response->ok() && is_array($response->json())) {
            $countries = collect($response->json())
                ->filter(function ($country) {
                    return isset($country['name']['common'], $country['cca2']);
                })
                ->sortBy(fn($c) => $c['name']['common'])
                ->map(function ($country) {
                    return [
                        'name' => $country['name']['common'],
                        'code' => $country['cca2'],
                    ];
                })
                ->values();
        } else {
            $countries = collect([
                ['name' => 'India', 'code' => 'IN'],
            ]);
        }

        $companies = Company::all();
        $managers = Employee::where('id', '!=', $employee->id)->get();

        return view('employees.edit', compact('employee', 'companies', 'managers', 'countries'));
    }

    // Update employee in database
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'position' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'manager_id' => 'nullable|exists:employees,id',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    // Delete employee from database
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}
