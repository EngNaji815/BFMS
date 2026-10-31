<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function index()
{
    $employees = employee::with('user')->latest()->get();

    return view('admin.Manage_Employees.index', compact('employees'));
}


    public function create()
    {
        return view('employees.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'First_name' => ['required', 'string', 'max:255'],
            'Last_name' => ['required', 'string', 'max:255'],


            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],

            'address' => [
                'nullable',
                'string',
                'max:255',
            ],

            'birth_date' => [
                'nullable',
                'date',
                'before:today',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'specialization' => [
                'required',
                'string',
                'max:100',
            ],
        ]);

        DB::transaction(function () use ($validated) {

            $user = User::create([
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'employee',
                'is_active' => true,
            ]);

            employee::create([
                'user_id' => $user->id,
                'First_name' => $validated['First_name'],
                'Last_name' => $validated['Last_name'],
                'address' => $validated['address'] ?? null,
                'birth_date' => $validated['birth_date'] ?? null,
                'phone' => $validated['phone'] ?? null,
                'specialization' => $validated['specialization'],
            ]);
        });

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }


    public function show(employee $employee)
    {
        $employee->load('user');

        return view('employees.show', compact('employee'));
    }


    public function edit(employee $employee)
    {
        $employee->load('user');

        return view('employees.edit', compact('employee'));
    }


    public function update(Request $request, employee $employee)
    {
        $validated = $request->validate([
            'First_name' => ['required', 'string', 'max:255'],
            'Last_name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')
                    ->ignore($employee->user_id),
            ],

            'address' => [
                'nullable',
                'string',
                'max:255',
            ],

            'birth_date' => [
                'nullable',
                'date',
                'before:today',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'specialization' => [
                'required',
                'string',
                'max:100',
            ],
        ]);

        DB::transaction(function () use ($validated, $employee) {

            $employee->update([
                'First_name' => $validated['First_name'],
                'Last_name' => $validated['Last_name'],
                'address' => $validated['address'] ?? null,
                'birth_date' => $validated['birth_date'] ?? null,
                'phone' => $validated['phone'] ?? null,
                'specialization' => $validated['specialization'],
            ]);

            $employee->user->update([
                'email' => $validated['email'],
            ]);
        });

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }


    public function destroy(employee $employee)
    {
        DB::transaction(function () use ($employee) {

            $user = $employee->user;

            $employee->delete();

            if ($user) {
                $user->delete();
            }
        });

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}