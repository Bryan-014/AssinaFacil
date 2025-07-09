<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Str;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'Administrador'
        ]);

        Role::create([
            'name' => 'Cliente'
        ]);

        Role::create([
            'name' => 'Revendedor'
        ]);

        User::create([
            'user'=>'Adm',
            'email'=>'admin@gmail.com',
            'tell'=>'41999999999',
            'document'=>'00000000000',
            'role_id'=>$adminRole->id,
            'password'=>Hash::make('admin123')
        ]);

        //TESTING PAYMENTS

        Payment::create([
            'id' => (string) Str::uuid(),
            'contract_id' => '8f4a7ba4-9639-4c13-b3af-87bb5d7175ec',
            'pay_date' => '2025-07-09',
            'invoice_id' => '',
            'value' => '150',
            'plan_id' => '2b527686-2677-4d3d-b680-8be0e74f0609'
        ]);

        Payment::create([
            'id' => (string) Str::uuid(),
            'contract_id' => '8f4a7ba4-9639-4c13-b3af-87bb5d7175ec',
            'pay_date' => '2024-07-09',
            'invoice_id' => '',
            'value' => '150',
            'plan_id' => '2b527686-2677-4d3d-b680-8be0e74f0609'
        ]);

        Payment::create([
            'id' => (string) Str::uuid(),
            'contract_id' => '8f4a7ba4-9639-4c13-b3af-87bb5d7175ec',
            'pay_date' => '2023-07-09',
            'invoice_id' => '',
            'value' => '150',
            'plan_id' => '2b527686-2677-4d3d-b680-8be0e74f0609'
        ]);

        Payment::create([
            'id' => (string) Str::uuid(),
            'contract_id' => '8f4a7ba4-9639-4c13-b3af-87bb5d7175ec',
            'pay_date' => '2022-07-09',
            'invoice_id' => '',
            'value' => '150',
            'plan_id' => '2b527686-2677-4d3d-b680-8be0e74f0609'
        ]);

        Payment::create([
            'id' => (string) Str::uuid(),
            'contract_id' => 'c22cc90b-0425-4c6d-b616-fe9842cc1b6f',
            'pay_date' => '2025-04-09',
            'invoice_id' => '',
            'value' => '90',
            'plan_id' => '5d8ca824-fccc-45d0-9791-54ad08de219b'
        ]);

        Payment::create([
            'id' => (string) Str::uuid(),
            'contract_id' => 'c22cc90b-0425-4c6d-b616-fe9842cc1b6f',
            'pay_date' => '2025-01-09',
            'invoice_id' => '',
            'value' => '90',
            'plan_id' => '5d8ca824-fccc-45d0-9791-54ad08de219b'
        ]);

        Payment::create([
            'id' => (string) Str::uuid(),
            'contract_id' => '554f11b0-b511-405d-b31c-91d871922a86',
            'pay_date' => '2025-07-09',
            'invoice_id' => '',
            'value' => '40',
            'plan_id' => '9f90efa2-232c-42ee-88d8-007a47c13c65'
        ]);

        Payment::create([
            'id' => (string) Str::uuid(),
            'contract_id' => '554f11b0-b511-405d-b31c-91d871922a86',
            'pay_date' => '2025-07-09',
            'invoice_id' => '',
            'value' => '40',
            'plan_id' => '9f90efa2-232c-42ee-88d8-007a47c13c65'
        ]);

        Payment::create([
            'id' => (string) Str::uuid(),
            'contract_id' => '554f11b0-b511-405d-b31c-91d871922a86',
            'pay_date' => '2025-06-09',
            'invoice_id' => '',
            'value' => '40',
            'plan_id' => '9f90efa2-232c-42ee-88d8-007a47c13c65'
        ]);

        Payment::create([
            'id' => (string) Str::uuid(),
            'contract_id' => '554f11b0-b511-405d-b31c-91d871922a86',
            'pay_date' => '2025-05-09',
            'invoice_id' => '',
            'value' => '40',
            'plan_id' => '9f90efa2-232c-42ee-88d8-007a47c13c65'
        ]);

        Payment::create([
            'id' => (string) Str::uuid(),
            'contract_id' => '554f11b0-b511-405d-b31c-91d871922a86',
            'pay_date' => '2025-04-09',
            'invoice_id' => '',
            'value' => '40',
            'plan_id' => '9f90efa2-232c-42ee-88d8-007a47c13c65'
        ]);
    }
}
