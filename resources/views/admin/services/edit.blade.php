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
    <x-bread-crumb page="Serviços" subPage="Editar" link="services.index"/>
    <div>
        <div class="cont">
            <div class="mt-2 mb-3 p-2">
                @php
                    $dados = [
                        [
                            'name' => 'Serviço',
                            'status' => 'act',
                        ],    
                        [
                            'name' => 'Planos',
                            'status' => 'free',
                            'link' => 'plans.index',
                            'params' => [
                                'service_id' => $id
                            ]
                        ]
                    ];
                @endphp
                <x-steps :data="$dados"/>
                <form action="{{route('services.update', ['id' => $service->id])}}" method="POST">
                    @csrf
                    <div class="wrapper-inputs">
                        <div class="upload-container">
                            <img id="preview" class="image-preview" src="{{ asset('storage/uploads/pic.svg') }}" alt="Pré-visualização da imagem">
                            <input type="file" id="foto" name="picService" class="file-input" accept="image/*" onchange="previewImagem(event)">
                            <label for="foto" class="primary-btn">Escolher Foto</label>
                        </div>
                        <div class="subs-inputs">
                            <x-primary-input type="text" name="name" label="Serviço" :messages="$errors->get('name')" :oldValue="$service->name"/>
                            <x-primary-input type="number" acceptDecimals="True" name="base_price" label="Valor" :messages="$errors->get('base_price')" :oldValue="$defPlan->price"/>
                        </div>
                    </div>
                    <div>
                        <x-primary-input type="text" name="description" label="Descrição" :messages="$errors->get('description')" :oldValue="$service->description"/>              
                    </div>
                    <div class="wrapper-inputs">
                        <x-primary-select name="duration_type" label="Tipo de Renovação" :messages="$errors->get('duration_type')" :oldValue="$defPlan->duration_type">
                            <option value="1" {{ old('duration_type', $defPlan->duration_type) == 'Diário' ? 'selected' : '' }}>Diário</option>
                            <option value="2" {{ old('duration_type', $defPlan->duration_type) == 'Semanal' ? 'selected' : '' }}>Semanal</option>
                            <option value="3" {{ old('duration_type', $defPlan->duration_type) == 'Mensal' ? 'selected' : '' }}>Mensal</option>
                            <option value="4" {{ old('duration_type', $defPlan->duration_type) == 'Anual' ? 'selected' : '' }}>Anual</option>
                        </x-primary-select>
                        <x-primary-input type="number" acceptDecimals="False" name="base_duration" label="Tempo do Plano" :messages="$errors->get('base_duration')" :oldValue="$defPlan->duration"/>
                    </div>    
                    <div class="d-flex justify-content-end">
                        <input class="primary-btn" type="submit" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function previewImagem(event) {
            const input = event.target;
            const preview = document.getElementById('preview');
    
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function changeContainer() {
            document.querySelector('#service-content').classList.add('force-none')
            document.querySelector('#plan-content').classList.remove('force-none')
        }
    </script>
@endsection

@section('js-resources')    
    @vite(['resources/js/app.js', 'resources/js/home.js'])
@endsection
