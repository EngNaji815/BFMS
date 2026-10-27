<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// ====================
// Admin
// ====================

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

});


// ====================
// Manager
// ====================

Route::middleware(['auth', 'role:manager'])->group(function () {

    Route::get('/manager/dashboard', function () {
        return view('manager.dashboard');
    })->name('manager.dashboard');

});


// ====================
// Employee
// ====================

Route::middleware(['auth', 'role:employee'])->group(function () {

    Route::get('/employee/dashboard', function () {
        return view('employee.dashboard');
    })->name('employee.dashboard');

});


// ====================
// Customer
// ====================

Route::middleware(['auth', 'role:customer'])->group(function () {

    Route::get('/customer/dashboard', function () {
        return view('customer.dashboard');
    })->name('customer.dashboard');

});