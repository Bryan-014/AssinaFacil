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
    <x-bread-crumb page="Serviços" subPage="Criar Plano" link="plans.index" :linkParam="['service_id' => $service_id]"/>
    <div>
        <div class="cont">
            <div id="plan-content" class="mb-3 mt-2">
                @php
                    $dados = [
                        [
                            'name' => 'Serviço',
                            'status' => 'free',
                            'link' => 'services.edit',
                            'params' => [
                                'id' => $service_id
                            ]
                        ],    
                        [
                            'name' => 'Planos',
                            'status' => 'act',
                        ]
                    ];
                @endphp
                <x-steps :data="$dados"/>
                <form action="{{ route('plans.store', ['service_id' => $service_id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="service_id" value="{{$service_id}}">
                    <div class="wrapper-inputs">
                        <x-primary-input type="text" name="description" label="Descrição" :messages="$errors->get('description')" :oldValue="old('description')"/>
                        <x-primary-input type="number" acceptDecimals="True" name="price" label="Valor" :messages="$errors->get('price')" :oldValue="old('price')"/>
                    </div>
                    <div class="wrapper-inputs">
                        <x-primary-select name="duration_type" label="Tipo de Renovação" :messages="$errors->get('duration_type')" :oldValue="old('duration_type')">
                            <option value="1">Diário</option>
                            <option value="2">Semanal</option>
                            <option value="3">Mensal</option>
                            <option value="4">Anual</option>
                        </x-primary-select>
                        <x-primary-input type="number" acceptDecimals="False" name="duration" label="Tempo de Renovação" :messages="$errors->get('duration')" :oldValue="old('duration')"/>
                    </div>
                    <div class="d-flex justify-content-end gap-3">
                        <input class="primary-btn" type="submit" value="Adicionar Plano">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js-resources')    
    @vite(['resources/js/app.js', 'resources/js/home.js'])
@endsection
