@extends('layouts.app')

@section('css-resources')
    @vite(['resources/css/reset.css', 'resources/css/components.css', 'resources/css/header.css', 'resources/css/table.css'])
@endsection

@section('header')
    @include('layouts.navbar')   
@endsection

@section('aside-links')
    @include('layouts.aside')   
@endsection

@section('cont-box')
    <x-bread-crumb page="Pagamentos"/>
    <div>
        <div class="cont">
            @php
                $tableConfig = [
                    'hasHead' => True,
                    'nameTable' => 'Pagamentos',
                    'hasCreate' => False,
                    'hasSearch' => True,
                    'hasModelCE' => True,
                    'importClientsModule' => False,
                    'btns' => [
                        'view' => True,
                        'edit' => False,
                        'delete' => False
                    ]
                ];

                $show = [
                    'Cliente',
                    'Serviço',
                    'Data'
                ];

                $columns = [
                    'contract->client->user',
                    'contract->plan->service->name',
                    'mask_pay_date'
                ];
            @endphp
            <x-table table="payment" :tableConfig="$tableConfig" :showValues="$show" :columns="$columns" :values="$payments"/>
        </div>
    </div>
@endsection
    
@section('js-resources')    
    @vite(['resources/js/app.js', 'resources/js/home.js'])
@endsection