@extends('layouts.master')

@section('title', 'Manager Dashboard')

@section('page-title', 'Manager Dashboard')

@section('content')

<div class="mb-7">
    <h1 class="text-2xl font-bold text-slate-900">
        Project Operations
    </h1>

    <p class="mt-1 text-sm text-slate-500">
        Monitor projects, employees and daily construction activities.
    </p>
</div>


<div class="grid gap-5 md:grid-cols-3">

    <div class="rounded-xl border border-slate-200 bg-white p-5">
        <p class="text-sm text-slate-500">Active Projects</p>
        <h3 class="mt-2 text-3xl font-semibold">0</h3>
    </div>

    <div class="rounded-xl border border-slate-200 bg-white p-5">
        <p class="text-sm text-slate-500">Assigned Employees</p>
        <h3 class="mt-2 text-3xl font-semibold">0</h3>
    </div>

    <div class="rounded-xl border border-slate-200 bg-white p-5">
        <p class="text-sm text-slate-500">Pending Tasks</p>
        <h3 class="mt-2 text-3xl font-semibold">0</h3>
    </div>

</div>

@endsection