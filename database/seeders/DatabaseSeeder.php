<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Person;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Administrador'
        ]);        

        Role::create([
            'name' => 'Cliente'
        ]);

        Person::create([
            'name' => 'Marcio'
        ]);        

        Person::create([
            'name' => 'Bryan'
        ]);
    }
}