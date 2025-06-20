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
    <x-bread-crumb page="Serviços" subPage="Cadastrar" link="services.index"/>
    <div>
        <div class="cont">
            <div id="service-content" class="m-2">
                @php
                    $dados = [
                        [
                            'name' => 'Serviço',
                            'status' => 'act',
                        ],    
                        [
                            'name' => 'Planos',
                            'status' => 'block',
                        ]
                    ];
                @endphp
                <x-steps :data="$dados"/>
                <form action="{{route('services.store')}}" method="POST">
                    @csrf
                    <div class="wrapper-inputs">
                        <div class="upload-container">
                            <img id="preview" class="image-preview" src="{{ asset('storage/uploads/pic.svg') }}" alt="Pré-visualização da imagem">
                            <input type="file" id="foto" class="file-input" accept="image/*" onchange="previewImagem(event)">
                            <label for="foto" class="primary-btn">Escolher Foto</label>
                        </div>
                        <div class="subs-inputs">
                            <x-primary-input type="text" name="name" label="Serviço" :messages="$errors->get('name')" :oldValue="old('name')"/>
                            <x-primary-input type="number" acceptDecimals="True" name="base_price" label="Valor" :messages="$errors->get('base_price')" :oldValue="old('base_price')"/>
                        </div>
                    </div>
                    <div>
                        <x-primary-input type="text" name="description" label="Descrição" :messages="$errors->get('description')" :oldValue="old('description')"/>              
                    </div>
                    <div class="wrapper-inputs">
                        <x-primary-select name="duration_type" label="Tipo de Renovação" :messages="$errors->get('duration_type')" :oldValue="old('duration_type')">
                            <option value="1">Diário</option>
                            <option value="2">Semanal</option>
                            <option value="3">Mensal</option>
                            <option value="4">Anual</option>
                        </x-primary-select>
                        <x-primary-input type="number" acceptDecimals="False" name="base_duration" label="Tempo do Plano" :messages="$errors->get('base_duration')" :oldValue="old('base_duration')"/>
                    </div>    
                    <div class="d-flex justify-content-end">
                        <input class="primary-btn" type="submit" value="Cadastrar">
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
    </script>
@endsection

@section('js-resources')    
    @vite(['resources/js/app.js', 'resources/js/home.js'])
@endsection
