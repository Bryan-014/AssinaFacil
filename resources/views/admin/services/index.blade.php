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
                    'Serviço',
                    'Valor'
                ];

                $values = [
                    // '1' => [
                    //     'service' => 'IPTV',
                    //     'value' => 'R$ 35.00'
                    // ],
                    // '2' => [
                    //     'service' => 'IPTV - Ao Vivo',
                    //     'value' => 'R$ 15.00'
                    // ],
                    // '3' => [
                    //     'service' => 'IPTV - Filmes',
                    //     'value' => 'R$ 15.00'
                    // ],
                    // '4' => [
                    //     'service' => 'IPTV - Séries',
                    //     'value' => 'R$ 15.00'
                    // ],
                ];
            @endphp
            <x-table table="services" :tableConfig="$tableConfig" :showValues="$show" :values="$values"/>            
        </div>
    </div>
@endsection

@section('js-resources')    
    @vite(['resources/js/app.js', 'resources/js/home.js'])
@endsection