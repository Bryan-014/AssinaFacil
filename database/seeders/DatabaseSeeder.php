<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Payment;
use App\Models\Service;
use App\Models\Plan;
use App\Models\Contract;
use App\Models\DealerGroup;
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

        $clientRole = Role::create([
            'name' => 'Cliente'
        ]);

        $dealerRole = Role::create([
            'name' =>'Revendedor'
        ]);

        $dealerGroup = DealerGroup::create([
            'id' => '9a1b8e25-5ba2-11f0-8862-641c678d852c',
            'dealer_id' => '1',
            'client_list' => '[2,3,4]'
        ]);

        User::insert([
            [
                'user'=>'Adm',
                'email'=>'admin@gmail.com',
                'tell'=>'41999999999',
                'document'=>'00000000000',
                'role_id'=>$adminRole->id,
                'password'=>Hash::make('admin@gmail.com')
            ],
            [
                'user'=>'Bryan Rosa',
                'email'=>'bryan@gmail.com',
                'tell'=>'41984075326',
                'document'=>'13730921908',
                'role_id'=>$clientRole->id,
                'password'=>Hash::make('bryan@gmail.com')
            ],
            [
                'user'=>'Roberto Rosa',
                'email'=>'roberto@gmail.com',
                'tell'=>'41988888888',
                'document'=>'75578612059',
                'role_id'=>$clientRole->id,
                'password'=>Hash::make('roberto@gmail.com')
            ],
            [
                'user'=>'Cliete',
                'email'=>'cliente@gmail.com',
                'tell'=>'41900000000',
                'document'=>'92822031070',
                'role_id'=>$clientRole->id,
                'password'=>Hash::make('cliente@gmail.com')
            ]
        ]);

        Service::insert([
            [
                'id' => '25acea32-ff34-4f0c-ae49-8d397b833758',
                'name' => 'Senac Saúde',
                'description' => 'Sistema de Gestão de pacientes e prontuários.',
                'base_plan_id' => '2b527686-2677-4d3d-b680-8be0e74f0609',
            ],
            [
                'id' => '35c7bb49-bd90-44b5-8373-2f69bbdc3d2a',
                'name' => 'Sys Feiras',
                'description' => 'Projeto desenvolvido para simplificar e automatizar as vendas de Feirantes e Ambulantes',
                'base_plan_id' => '9f90efa2-232c-42ee-88d8-007a47c13c65',
            ],
            [
                'id' => 'af7f05c7-5af9-4759-bc7b-1b176f18166c',
                'name' => 'Assina Fácil',
                'description' => 'Projeto desenvolvido para automatizar e simplificar a gestão de serviços recorrentes em empresas de tecnologia.',
                'base_plan_id' => '6faa92b4-5a67-497d-8259-1255225dd304',
            ],
        ]);

        Plan::insert([
            [
                'id' => '2b527686-2677-4d3d-b680-8be0e74f0609',
                'description' => 'Plano Atual',
                'price' => 150,
                'duration' => 1,
                'duration_type' => 'Anual',
                'service_id' => '25acea32-ff34-4f0c-ae49-8d397b833758'
            ],
            [
                'id' => '5d8ca824-fccc-45d0-9791-54ad08de219b',
                'description' => 'Plano Trimestral',
                'price' => 90,
                'duration' => 3,
                'duration_type' => 'Mensal',
                'service_id' => 'af7f05c7-5af9-4759-bc7b-1b176f18166c'
            ],
            [
                'id' => '6faa92b4-5a67-497d-8259-1255225dd304',
                'description' => 'Plano Mensal',
                'price' => 35,
                'duration' => 1,
                'duration_type' => 'Mensal',
                'service_id' => 'af7f05c7-5af9-4759-bc7b-1b176f18166c'
            ],
            [
                'id' => '9f90efa2-232c-42ee-88d8-007a47c13c65',
                'description' => 'Plano Mensal',
                'price' => 40,
                'duration' => 1,
                'duration_type' => 'Mensal',
                'service_id' => '35c7bb49-bd90-44b5-8373-2f69bbdc3d2a'
            ],
        ]);

        Contract::insert([
            [
                'id' => '554f11b0-b511-405d-b31c-91d871922a86',
                'dealer_group_id' => '9a1b8e25-5ba2-11f0-8862-641c678d852c',
                'plan_id' => '9f90efa2-232c-42ee-88d8-007a47c13c65',
                'client_id' => 4,
                'contract_date' => '2025-07-09',
                'add_infos' => '{}',
            ],
            [
                'id' => '8f4a7ba4-9639-4c13-b3af-87bb5d7175ec',
                'dealer_group_id' => '9a1b8e25-5ba2-11f0-8862-641c678d852c',
                'plan_id' => '2b527686-2677-4d3d-b680-8be0e74f0609',
                'client_id' => 2,
                'contract_date' => '2025-07-08',
                'add_infos' => '{}',
            ],
            [
                'id' => 'bccf445b-1e6f-4804-90ad-bc7045de78b6',
                'dealer_group_id' => '9a1b8e25-5ba2-11f0-8862-641c678d852c',
                'plan_id' => '5d8ca824-fccc-45d0-9791-54ad08de219b',
                'client_id' => 2,
                'contract_date' => '2025-07-09',
                'add_infos' => '{}',
            ],
            [
                'id' => 'c22cc90b-0425-4c6d-b616-fe9842cc1b6f',
                'dealer_group_id' => '9a1b8e25-5ba2-11f0-8862-641c678d852c',
                'plan_id' => '5d8ca824-fccc-45d0-9791-54ad08de219b',
                'client_id' => 3,
                'contract_date' => '2025-07-08',
                'add_infos' => '{}',
            ],
        ]);

        //TESTING PAYMENTS

        Payment::insert([
            [
                'id' => (string) Str::uuid(),
                'contract_id' => '8f4a7ba4-9639-4c13-b3af-87bb5d7175ec',
                'pay_date' => '2025-07-09',
                'invoice_id' => '',
                'value' => '150',
                'plan_id' => '2b527686-2677-4d3d-b680-8be0e74f0609'
            ],
            [                
                'id' => (string) Str::uuid(),
                'contract_id' => '8f4a7ba4-9639-4c13-b3af-87bb5d7175ec',
                'pay_date' => '2024-07-09',
                'invoice_id' => '',
                'value' => '150',
                'plan_id' => '2b527686-2677-4d3d-b680-8be0e74f0609'
            ],
            [
                'id' => (string) Str::uuid(),
                'contract_id' => '8f4a7ba4-9639-4c13-b3af-87bb5d7175ec',
                'pay_date' => '2023-07-09',
                'invoice_id' => '',
                'value' => '150',
                'plan_id' => '2b527686-2677-4d3d-b680-8be0e74f0609'
            ],
            [
                'id' => (string) Str::uuid(),
                'contract_id' => '8f4a7ba4-9639-4c13-b3af-87bb5d7175ec',
                'pay_date' => '2022-07-09',
                'invoice_id' => '',
                'value' => '150',
                'plan_id' => '2b527686-2677-4d3d-b680-8be0e74f0609'
            ],
            [
                'id' => (string) Str::uuid(),
                'contract_id' => 'c22cc90b-0425-4c6d-b616-fe9842cc1b6f',
                'pay_date' => '2025-04-09',
                'invoice_id' => '',
                'value' => '90',
                'plan_id' => '5d8ca824-fccc-45d0-9791-54ad08de219b'                
            ],
            [
                'id' => (string) Str::uuid(),
                'contract_id' => 'c22cc90b-0425-4c6d-b616-fe9842cc1b6f',
                'pay_date' => '2025-01-09',
                'invoice_id' => '',
                'value' => '90',
                'plan_id' => '5d8ca824-fccc-45d0-9791-54ad08de219b'
            ],
            [
                'id' => (string) Str::uuid(),
                'contract_id' => '554f11b0-b511-405d-b31c-91d871922a86',
                'pay_date' => '2025-07-09',
                'invoice_id' => '',
                'value' => '40',
                'plan_id' => '9f90efa2-232c-42ee-88d8-007a47c13c65'
            ],
            [
                'id' => (string) Str::uuid(),
                'contract_id' => '554f11b0-b511-405d-b31c-91d871922a86',
                'pay_date' => '2025-07-09',
                'invoice_id' => '',
                'value' => '40',
                'plan_id' => '9f90efa2-232c-42ee-88d8-007a47c13c65'
            ],
            [
                'id' => (string) Str::uuid(),
                'contract_id' => '554f11b0-b511-405d-b31c-91d871922a86',
                'pay_date' => '2025-06-09',
                'invoice_id' => '',
                'value' => '40',
                'plan_id' => '9f90efa2-232c-42ee-88d8-007a47c13c65'
            ],
            [
                'id' => (string) Str::uuid(),
                'contract_id' => '554f11b0-b511-405d-b31c-91d871922a86',
                'pay_date' => '2025-05-09',
                'invoice_id' => '',
                'value' => '40',
                'plan_id' => '9f90efa2-232c-42ee-88d8-007a47c13c65'
            ],
            [
                'id' => (string) Str::uuid(),
                'contract_id' => '554f11b0-b511-405d-b31c-91d871922a86',
                'pay_date' => '2025-04-09',
                'invoice_id' => '',
                'value' => '40',
                'plan_id' => '9f90efa2-232c-42ee-88d8-007a47c13c65'
            ],
        ]);
    }
}
