
@extends('layouts.Admin-Master')

@section('title', 'Manage Employees')
@section('page-title', 'Manage Employees')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900">Employees</h1>
            <p class="mt-1 text-sm text-slate-500">View and manage all employees in the system.</p>
        </div>

        <button type="button" id="open-add-employee-modal"
            class="inline-flex items-center justify-center gap-2 rounded-lg bg-amber-500 px-4 py-2.5 text-sm font-semibold text-slate-950 shadow-sm transition hover:bg-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-500/40">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add Employee
        </button>
    </div>

    @include('admin.Manage_Employees.Add_Employee')
    @include('admin.Manage_Employees.Edite_Employee')
    @include('admin.Manage_Employees.Delete_Employee')

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Total Employees</p>
                    <p class="mt-2 text-3xl font-bold text-slate-900">{{ $employees->count() }}</p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-slate-700">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H2v-2a4 4 0 014-4h3m4-4a4 4 0 100-8 4 4 0 000 8"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Active Employees</p>
                    <p class="mt-2 text-3xl font-bold text-slate-900">{{ $employees->filter(fn($employee) => $employee->user?->is_active)->count() }}</p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm sm:col-span-2 lg:col-span-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-slate-500">Inactive Employees</p>
                    <p class="mt-2 text-3xl font-bold text-slate-900">{{ $employees->filter(fn($employee) => !$employee->user?->is_active)->count() }}</p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-red-50 text-red-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm sm:p-5">
        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
            <div class="xl:col-span-2">
                <label for="employee-search" class="mb-1.5 block text-xs font-semibold uppercase tracking-wide text-slate-500">Search Employee</label>
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"/>
                    </svg>
                    <input id="employee-search" type="text" placeholder="Search by name, email or phone..."
                        class="w-full rounded-lg border border-slate-300 py-2.5 pl-10 pr-4 text-sm outline-none transition placeholder:text-slate-400 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20">
                </div>
            </div>

            <div>
                <label for="specialization-filter" class="mb-1.5 block text-xs font-semibold uppercase tracking-wide text-slate-500">Specialization</label>
                <select id="specialization-filter" class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none transition focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20">
                    <option value="">All Specializations</option>
                    @foreach($employees->pluck('specialization')->filter()->unique()->sort() as $specialization)
                        <option value="{{ strtolower($specialization) }}">{{ $specialization }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="status-filter" class="mb-1.5 block text-xs font-semibold uppercase tracking-wide text-slate-500">Status</label>
                <select id="status-filter" class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none transition focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20">
                    <option value="">All Statuses</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>

        <div class="mt-4 flex items-center justify-between border-t border-slate-100 pt-4">
            <p class="text-sm text-slate-500">
                Showing <span id="visible-count" class="font-semibold text-slate-900">{{ $employees->count() }}</span> employees
            </p>
            <button id="clear-filters" type="button" class="hidden text-sm font-semibold text-amber-600 transition hover:text-amber-700">Clear Filters</button>
        </div>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-200 px-5 py-4">
            <h2 class="font-semibold text-slate-900">Employee List</h2>
            <p class="mt-0.5 text-xs text-slate-500">All registered employees in SCMS.</p>
        </div>

        <div class="hidden overflow-x-auto md:block">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        @foreach(['Employee','Contact','Specialization','Status','Joined'] as $heading)
                            <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">{{ $heading }}</th>
                        @endforeach
                        <th class="px-5 py-3 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">Actions</th>
                    </tr>
                </thead>

                <tbody id="employee-table-body" class="divide-y divide-slate-100">
                    @forelse($employees as $employee)
                        @php
                            $fullName = trim(($employee->First_name ?? '') . ' ' . ($employee->Last_name ?? ''));
                            $initials = strtoupper(substr($employee->First_name ?? 'E', 0, 1)) . strtoupper(substr($employee->Last_name ?? '', 0, 1));
                            $status = $employee->user?->is_active ? 'active' : 'inactive';
                        @endphp

                        <tr class="employee-row transition hover:bg-slate-50"
                            data-name="{{ strtolower($fullName) }}"
                            data-email="{{ strtolower($employee->user?->email ?? '') }}"
                            data-phone="{{ strtolower($employee->phone ?? '') }}"
                            data-specialization="{{ strtolower($employee->specialization ?? '') }}"
                            data-status="{{ $status }}">

                            <td class="whitespace-nowrap px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-slate-900 text-xs font-bold text-amber-400">{{ $initials }}</div>
                                    <div>
                                        <p class="font-semibold text-slate-900">{{ $fullName ?: 'Unnamed Employee' }}</p>
                                        <p class="mt-0.5 text-xs text-slate-400">Employee #{{ $employee->id }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-5 py-4">
                                <p class="max-w-52 truncate text-sm text-slate-700">{{ $employee->user?->email ?? '—' }}</p>
                                <p class="mt-1 text-xs text-slate-500">{{ $employee->phone ?? 'No phone' }}</p>
                            </td>

                            <td class="whitespace-nowrap px-5 py-4">
                                <span class="inline-flex rounded-full bg-amber-50 px-2.5 py-1 text-xs font-semibold text-amber-700">{{ $employee->specialization ?? 'Not specified' }}</span>
                            </td>

                            <td class="whitespace-nowrap px-5 py-4">
                                @if($employee->user?->is_active)
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-medium text-emerald-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-2.5 py-1 text-xs font-medium text-red-600">
                                        <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>Inactive
                                    </span>
                                @endif
                            </td>

                            <td class="whitespace-nowrap px-5 py-4 text-sm text-slate-500">{{ $employee->created_at?->format('M d, Y') ?? '—' }}</td>

                            <td class="whitespace-nowrap px-5 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('employees.show', $employee) }}"
                                        class="inline-flex items-center gap-1.5 rounded-lg border border-blue-200 bg-blue-50 px-2.5 py-2 text-xs font-semibold text-blue-700 transition hover:bg-blue-100"
                                        title="View Employee">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12 18 18.75 12 18.75 2.25 12 2.25 12z"/>
                                            <circle cx="12" cy="12" r="3" stroke-width="2"/>
                                        </svg>
                                        <span class="hidden xl:inline">View</span>
                                    </a>

                                    <button type="button"
                                        class="open-edit-employee inline-flex items-center gap-1.5 rounded-lg border border-amber-200 bg-amber-50 px-2.5 py-2 text-xs font-semibold text-amber-700 transition hover:bg-amber-100"
                                        data-id="{{ $employee->id }}"
                                        data-first-name="{{ $employee->First_name }}"
                                        data-last-name="{{ $employee->Last_name }}"
                                        data-email="{{ $employee->user?->email ?? '' }}"
                                        data-phone="{{ $employee->phone ?? '' }}"
                                        data-address="{{ $employee->address ?? '' }}"
                                        data-birth-date="{{ $employee->birth_date?->format('Y-m-d') ?? '' }}"
                                        data-specialization="{{ $employee->specialization ?? '' }}"
                                        title="Edit Employee">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.862 3.487a2.25 2.25 0 113.182 3.182L8.25 18.463 3.75 20.25l1.787-4.5L16.862 3.487zM14.25 6.75l3 3"/>
                                        </svg>
                                        <span class="hidden xl:inline">Edit</span>
                                    </button>

                                    <button type="button"
                                        class="open-delete-employee inline-flex items-center gap-1.5 rounded-lg border border-red-200 bg-red-50 px-2.5 py-2 text-xs font-semibold text-red-700 transition hover:bg-red-100"
                                        data-id="{{ $employee->id }}"
                                        data-name="{{ $fullName }}"
                                        title="Delete Employee">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6h18M8 6V4.5A1.5 1.5 0 019.5 3h5A1.5 1.5 0 0116 4.5V6M19 6l-1 14H6L5 6M10 10v6M14 10v6"/>
                                        </svg>
                                        <span class="hidden xl:inline">Delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center text-sm text-slate-500">No employees have been added yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div id="employee-mobile-list" class="divide-y divide-slate-100 md:hidden">
            @foreach($employees as $employee)
                @php
                    $fullName = trim(($employee->First_name ?? '') . ' ' . ($employee->Last_name ?? ''));
                    $initials = strtoupper(substr($employee->First_name ?? 'E', 0, 1)) . strtoupper(substr($employee->Last_name ?? '', 0, 1));
                    $status = $employee->user?->is_active ? 'active' : 'inactive';
                @endphp

                <div class="employee-card p-4"
                    data-name="{{ strtolower($fullName) }}"
                    data-email="{{ strtolower($employee->user?->email ?? '') }}"
                    data-phone="{{ strtolower($employee->phone ?? '') }}"
                    data-specialization="{{ strtolower($employee->specialization ?? '') }}"
                    data-status="{{ $status }}">

                    <div class="flex items-start justify-between gap-3">
                        <div class="flex min-w-0 items-center gap-3">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-slate-900 text-xs font-bold text-amber-400">{{ $initials }}</div>
                            <div class="min-w-0">
                                <p class="truncate font-semibold text-slate-900">{{ $fullName ?: 'Unnamed Employee' }}</p>
                                <p class="truncate text-xs text-slate-500">{{ $employee->user?->email ?? '—' }}</p>
                            </div>
                        </div>

                        @if($employee->user?->is_active)
                            <span class="shrink-0 rounded-full bg-emerald-50 px-2 py-1 text-[11px] font-medium text-emerald-700">Active</span>
                        @else
                            <span class="shrink-0 rounded-full bg-red-50 px-2 py-1 text-[11px] font-medium text-red-600">Inactive</span>
                        @endif
                    </div>

                    <div class="mt-4 grid grid-cols-2 gap-3">
                        <div>
                            <p class="text-xs text-slate-400">Specialization</p>
                            <p class="mt-1 text-sm font-medium text-slate-700">{{ $employee->specialization ?? '—' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-slate-400">Phone</p>
                            <p class="mt-1 text-sm font-medium text-slate-700">{{ $employee->phone ?? '—' }}</p>
                        </div>
                    </div>

                    <div class="mt-4 flex gap-2 border-t border-slate-100 pt-4">
                        <a href="{{ route('employees.show', $employee) }}"
                            class="flex-1 rounded-lg border border-blue-200 bg-blue-50 px-3 py-2 text-center text-xs font-semibold text-blue-700 transition hover:bg-blue-100">View</a>

                        <button type="button"
                            class="open-edit-employee flex-1 rounded-lg border border-amber-200 bg-amber-50 px-3 py-2 text-center text-xs font-semibold text-amber-700 transition hover:bg-amber-100"
                            data-id="{{ $employee->id }}"
                            data-first-name="{{ $employee->First_name }}"
                            data-last-name="{{ $employee->Last_name }}"
                            data-email="{{ $employee->user?->email ?? '' }}"
                            data-phone="{{ $employee->phone ?? '' }}"
                            data-address="{{ $employee->address ?? '' }}"
                            data-birth-date="{{ $employee->birth_date?->format('Y-m-d') ?? '' }}"
                            data-specialization="{{ $employee->specialization ?? '' }}">Edit</button>

                        <button type="button"
                            class="open-delete-employee flex-1 rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100"
                            data-id="{{ $employee->id }}"
                            data-name="{{ $fullName }}">Delete</button>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="no-filter-results" class="hidden px-6 py-16 text-center">
            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-slate-100 text-slate-400">
                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"/>
                </svg>
            </div>
            <h3 class="mt-4 font-semibold text-slate-900">No employees found</h3>
            <p class="mt-1 text-sm text-slate-500">Try changing your search or filter criteria.</p>
        </div>
    </div>
</div>

<script src="{{ asset('build/assets/AdminScrpt_Emp.js') }}"></script>
@endsection
