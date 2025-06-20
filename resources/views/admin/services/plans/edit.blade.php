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
    <x-bread-crumb page="Serviços" subPage="Editar Plano" link="plans.index" :linkParam="['service_id' => $service_id]"/>
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
            <form action="{{ route('plans.update', ['service_id' => $service_id, 'id' => $plan->id]) }}" method="POST">
                @csrf
                <div class="wrapper-inputs">
                    <x-primary-input type="text" name="description" label="Descrição" :messages="$errors->get('description')" :oldValue="$plan->description"/>
                    <x-primary-input type="number" acceptDecimals="True" name="price" label="Valor" :messages="$errors->get('price')" :oldValue="$plan->price"/>
                </div>
                <div class="wrapper-inputs">
                    <x-primary-select name="duration_type" label="Tipo de Renovação" :messages="$errors->get('duration_type')" :oldValue="$plan->duration_type">
                        <option value="1" {{ old('duration_type', $plan->duration_type) == 'Diário' ? 'selected' : '' }}>Diário</option>
                        <option value="2" {{ old('duration_type', $plan->duration_type) == 'Semanal' ? 'selected' : '' }}>Semanal</option>
                        <option value="3" {{ old('duration_type', $plan->duration_type) == 'Mensal' ? 'selected' : '' }}>Mensal</option>
                        <option value="4" {{ old('duration_type', $plan->duration_type) == 'Anual' ? 'selected' : '' }}>Anual</option>
                    </x-primary-select>
                    <x-primary-input type="number" acceptDecimals="True" name="duration" label="Tempo de Renovação" :messages="$errors->get('duration')" :oldValue="$plan->duration"/>
                </div>
                <div class="d-flex justify-content-end">
                    <input class="primary-btn" type="submit" value="Editar Plano">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js-resources')    
    @vite(['resources/js/app.js', 'resources/js/home.js'])
@endsection
