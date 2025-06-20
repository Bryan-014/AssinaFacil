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
    <x-bread-crumb page="Serviços"/>
    <div>
        <div class="cont">
            @php
                $tableConfig = [
                    'hasHead' => True,
                    'nameTable' => 'Serviço',
                    'hasCreate' => True,
                    'hasSearch' => True,
                    'hasModelCE' => False,
                    'importClientsModule' => False
                ];

                $show = [
                    'Serviço'
                ];

                $columns = [
                    'name'
                ];
            @endphp
            <x-table table="services" :tableConfig="$tableConfig" :showValues="$show" :columns="$columns" :values="$services"/>            
        </div>
    </div>
@endsection

@section('js-resources')    
    @vite(['resources/js/app.js', 'resources/js/home.js'])
@endsection