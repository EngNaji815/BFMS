@extends('layouts.Admin-Master')

@section('title', 'Admin Dashboard')

@section('page-title', 'Admin Dashboard')

@section('content')

    <div class="mb-7">

        <h1 class="text-2xl font-bold text-slate-900">
            Welcome back
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Here's an overview of your construction management system.
        </p>

    </div>


    <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">

        <div class="rounded-xl border border-slate-200 bg-white p-5">

            <div class="flex items-start justify-between">

                <div>
                    <p class="text-sm text-slate-500">
                        Employees
                    </p>

                    <h3 class="mt-2 text-3xl font-semibold text-slate-900">
                        0
                    </h3>
                </div>

                <div class="rounded-lg bg-amber-50 p-3 text-amber-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-width="1.8"
                              d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8"/>
                    </svg>
                </div>

            </div>

        </div>


        {{-- Projects --}}
        <div class="rounded-xl border border-slate-200 bg-white p-5">

            <p class="text-sm text-slate-500">
                Active Projects
            </p>

            <h3 class="mt-2 text-3xl font-semibold text-slate-900">
                0
            </h3>

        </div>


        {{-- Customers --}}
        <div class="rounded-xl border border-slate-200 bg-white p-5">

            <p class="text-sm text-slate-500">
                Customers
            </p>

            <h3 class="mt-2 text-3xl font-semibold text-slate-900">
                0
            </h3>

        </div>


        {{-- Tasks --}}
        <div class="rounded-xl border border-slate-200 bg-white p-5">

            <p class="text-sm text-slate-500">
                Pending Tasks
            </p>

            <h3 class="mt-2 text-3xl font-semibold text-slate-900">
                0
            </h3>

        </div>

    </div>


    <div class="mt-7 grid gap-6 xl:grid-cols-3">

        <div class="rounded-xl border border-slate-200 bg-white p-6 xl:col-span-2">

            <div class="mb-5 flex items-center justify-between">

                <div>
                    <h2 class="font-semibold text-slate-900">
                        Active Projects
                    </h2>

                    <p class="mt-1 text-xs text-slate-500">
                        Current construction projects
                    </p>
                </div>

            </div>

            <div class="flex min-h-52 items-center justify-center rounded-lg border border-dashed border-slate-200">

                <p class="text-sm text-slate-400">
                    No projects available yet.
                </p>

            </div>

        </div>


        <div class="rounded-xl border border-slate-200 bg-white p-6">

            <h2 class="font-semibold text-slate-900">
                Quick Actions
            </h2>

            <div class="mt-5 space-y-2">

                <a
                    href="{{ route('employees.create') }}"
                    class="block rounded-lg border border-slate-200 px-4 py-3 text-sm font-medium text-slate-700 transition hover:border-amber-400 hover:bg-amber-50"
                >
                    + Add Employee
                </a>

                <a
                    href="#"
                    class="block rounded-lg border border-slate-200 px-4 py-3 text-sm font-medium text-slate-700 transition hover:border-amber-400 hover:bg-amber-50"
                >
                    + Create Project
                </a>

                <a
                    href="#"
                    class="block rounded-lg border border-slate-200 px-4 py-3 text-sm font-medium text-slate-700 transition hover:border-amber-400 hover:bg-amber-50"
                >
                    + Add Customer
                </a>

            </div>

        </div>

    </div>

@endsection