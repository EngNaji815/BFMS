<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\employee;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {


            $adminUser = User::create([
                'email' => 'admin@gmail.com',
                'password' => Hash::make('Admin123456'),
                'role' => 'admin',
                'is_active' => true,
            ]);

            Admin::create([
                'user_id' => $adminUser->id,
                'First_name' => 'Omar',
                'Last_name' => 'Khaled',
                'phone' => '0935123456',
                'address' => 'Damascus, Syria',
                'birth_date' => '1992-04-15',
            ]);

            $managerUser = User::create([
                'email' => 'manager@gmail.com',
                'password' => Hash::make('Admin123456'),
                'role' => 'manager',
                'is_active' => true,
            ]);

            Manager::create([
                'user_id' => $managerUser->id,
             'First_name' => 'Ahmad',
                'Last_name' => 'Hasan',
                'phone' => '0944234567',
                'address' => 'Damascus, Syria',
                'birth_date' => '1990-08-22',
            ]);


            $employeeUser = User::create([
                'email' => 'employee@gmail.com',
                'password' => Hash::make('Admin123456'),
                'role' => 'employee',
                'is_active' => true,
            ]);

            employee::create([
                'user_id' => $employeeUser->id,
                'First_name' => 'Ali',
                'Last_name' => 'Hassan',
                'phone' => '0955345678',
                'address' => 'Rif Damascus, Syria',
                'birth_date' => '1998-02-10',
                'specialization' => 'Construction',
            ]);


            $customerUser = User::create([
                'email' => 'customer@gmail.com',
                'password' => Hash::make('Admin123456'),
                'role' => 'customer',
                'is_active' => true,
            ]);

            Customer::create([
                'user_id' => $customerUser->id,
                'First_name' => 'Sara',
                'Last_name' => 'Kheder',
                'phone' => '0966456789',
                'address' => 'Aleppo, Syria',
                'birth_date' => '1987-11-05',
            ]);

        });
    }
}