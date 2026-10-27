<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin123456'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
           'password' => Hash::make('Admin123456'),
            'role' => 'manager',
        ]);

        User::create([
            'name' => 'Employee',
            'email' => 'employee@gmail.com',
             'password' => Hash::make('Admin123456'),
            'role' => 'employee',
        ]);

        User::create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
         'password' => Hash::make('Admin123456'),
            'role' => 'customer',
        ]);
    }
}