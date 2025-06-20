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
    <x-bread-crumb page="Serviços" subPage="Planos" link="services.index"/>
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

                    $tableConfig = [
                        'hasHead' => True,
                        'nameTable' => 'Plano',
                        'hasCreate' => True,
                        'hasSearch' => True,
                        'hasModelCE' => False,
                        'importClientsModule' => False,
                        'addParams' => [
                            'name' => 'service_id',
                            'value' => $service_id
                        ]
                    ];
    
                    $show = [
                        'Plano',
                        'Valor'
                    ];
    
                    $columns = [
                        'description',
                        'price'
                    ];
                @endphp
                <x-steps :data="$dados"/>
                <x-table table="plans" :tableConfig="$tableConfig" :showValues="$show" :columns="$columns" :values="$plans"/>      

                {{-- <div class="steps">
                    <div class="step step-free">
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
                    <div class="step step-act">
                        <div class="num-step">
                            2
                        </div>
                        <div class="label-step">
                            Planos
                        </div>
                    </div>
                </div>
                <div class="wrapper-inputs">
                    <div class="primary-input">
                        <div>
                            <input type="text" placeholder=" " name="nome" id="nome" value="">
                            <label for="nome">Nome</label>
                        </div>
                        <p id="response-nome"></p>
                    </div>
                    <div class="primary-input">
                        <div>
                            <input type="text" placeholder=" " name="email" id="email" value="">
                            <label for="email">Descrição</label>
                        </div>
                        <p id="response-email"></p>
                    </div>
                </div>
                <div class="wrapper-inputs">
                    <div class="primary-input">
                        <div>
                            <input type="text" placeholder=" " name="email" id="email" value="">
                            <label for="email">Valor</label>
                        </div>
                        <p id="response-email"></p>
                    </div>
                    <div class="primary-input">
                        <div>
                            <input type="text" placeholder=" " name="email" id="email" value="">
                            <label for="email">Duração</label>
                        </div>
                        <p id="response-email"></p>
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-3">
                    <input class="primary-btn" type="submit" value="Adicionar Plano">
                    <input class="primary-btn" type="submit" value="Finalizar Cadastro">
                </div> --}}
            </div>
        </div>
    </div>
@endsection

@section('js-resources')    
    @vite(['resources/js/app.js', 'resources/js/home.js'])
@endsection
