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
                    'importClientsModule' => False
                ];

                $show = [
                    'Cliente',
                    'Serviço',
                    'Data',
                    'Valor'
                ];
            @endphp
            <x-table table="payments" :tableConfig="$tableConfig" :showValues="$show" :values="$values"/>
        </div>
    </div>
@endsection
    
@section('js-resources')    
    @vite(['resources/js/app.js', 'resources/js/home.js'])
@endsection