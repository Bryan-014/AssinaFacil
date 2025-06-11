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
    <x-bread-crumb/>
    <div>
        <div class="cont">
            <div class="mt-2 mb-3">
                <div class="steps">
                    <div class="step step-act">
                        <div class="num-step">
                            1
                        </div>
                        <div class="label-step">
                            Serviço
                        </div>
                    </div>
                    <div class="mid-step">
                        <div class="point"></div>
                        <div class="point"></div>
                        <div class="point"></div>
                    </div>
                    <div class="step step-free">
                        <div class="num-step">
                            2
                        </div>
                        <div class="label-step">
                            Planos
                        </div>
                    </div>
                </div>
                <div class="wrapper-inputs">
                    <div class="upload-container">
                        <img id="preview" class="image-preview" src="../../../img/service/iptv.png" alt="Pré-visualização da imagem">
                        <input type="file" id="foto" class="file-input" accept="image/*" onchange="previewImagem(event)">
                        <label for="foto" class="primary-btn">Escolher Foto</label>
                    </div>
                    <div class="subs-inputs">
                        <div class="primary-input">
                            <div>
                                <input type="text" placeholder=" " name="nome" id="nome" value="IPTV">
                                <label for="nome">Serviço</label>
                            </div>
                            <p id="response-nome"></p>
                        </div>
                        <div class="primary-input">
                            <div>
                                <input type="text" placeholder=" " name="email" id="email" value="R$ 35,00">
                                <label for="email">Valor</label>
                            </div>
                            <p id="response-email"></p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="primary-input">
                        <div>
                            <input type="text" placeholder=" " name="cpf" id="cpf" value="Acesso às mídias digitais mais curtidas">
                            <label for="cpf">Descrição</label>
                        </div>
                        <p id="response-cpf"></p>
                    </div>                                    
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <input class="primary-btn" type="submit" value="Exluir">
                    <input class="primary-btn" type="submit" value="Editar">
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
