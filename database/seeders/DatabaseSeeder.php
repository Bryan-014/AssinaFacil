<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;

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
    }
}
