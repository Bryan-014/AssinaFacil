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
            <div id="service-content" class="mt-2 mb-3">
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
                <div class="wrapper-inputs">
                    <div class="upload-container">
                        <img id="preview" class="image-preview" src="../../../img/shered/pic.svg" alt="Pré-visualização da imagem">
                        <input type="file" id="foto" class="file-input" accept="image/*" onchange="previewImagem(event)">
                        <label for="foto" class="primary-btn">Escolher Foto</label>
                    </div>
                    <div class="subs-inputs">
                        <div class="primary-input">
                            <div>
                                <input type="text" placeholder=" " name="nome" id="nome" value="">
                                <label for="nome">Serviço</label>
                            </div>
                            <p id="response-nome"></p>
                        </div>
                        <div class="primary-input">
                            <div>
                                <input type="text" placeholder=" " name="email" id="email" value="">
                                <label for="email">Valor</label>
                            </div>
                            <p id="response-email"></p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="primary-input">
                        <div>
                            <input type="text" placeholder=" " name="cpf" id="cpf" value="">
                            <label for="cpf">Descrição</label>
                        </div>
                        <p id="response-cpf"></p>
                    </div>                                    
                </div>
                <div class="d-flex justify-content-end">
                    <input class="primary-btn" type="submit" value="Cadastrar" onclick="changeContainer()">
                </div>
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
