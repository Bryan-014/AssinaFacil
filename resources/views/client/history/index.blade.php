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
    <x-bread-crumb page="Histórico"/>
    <div>
        <div class="cont">
            @php
                $tableConfig = [
                    'hasHead' => True,
                    'nameTable' => 'Pagamentos',
                    'hasCreate' => false,
                    'hasSearch' => True,
                    'hasModelCE' => False,
                    'importClientsModule' => False,
                    'btns' => [
                        'view' => True,
                        'edit' => False,
                        'delete' => False
                    ]
                ];

                $show = [
                    'Serviço',
                    'Data',
                    'Valor'
                ];

                $columns = [
                    'contract->plan->service->name',
                    'pay_date',
                    'contract->plan->price',
                ];
            @endphp
            <x-table table="payments" :tableConfig="$tableConfig" :showValues="$show" :columns="$columns" :values="$payments"/>   
        </div>
    </div>
@endsection

@section('js-resources')    
    @vite(['resources/js/app.js', 'resources/js/home.js'])
@endsection
