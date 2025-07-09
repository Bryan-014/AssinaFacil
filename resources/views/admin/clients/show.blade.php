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
    <x-bread-crumb page="Clientes" subPage="Visualizar" link="clients.index"/>
    <div>
        <div class="cont">
            <div class="main-infos mt-2">
                <div class="client-info">
                    <h2>Informações do Cliente</h2>
                    <div class="wrapper-flex">
                        <span><b>Nome:</b> {{$user->user}}</span>                        
                        <span><b>Email:</b> {{$user->email}}</span>
                    </div>
                </div>
                <div class="my-services">
                    <div class="list-cont">
                        @if (count($contracts) != 0) 
                            @foreach ($contracts as $contract)
                                <a class="service-link" href="{{route('clients.contract', ['id' => $user->id, 'contract_id' => $contract->id])}}">
                                    <div class="service">
                                        <div class="img-service">
                                            <img src="{{ asset('storage/uploads/pic.svg') }}" alt="">
                                        </div>
                                        <div class="services-texts">
                                            <div class="title">
                                                <h3>{{$contract->plan->service->name}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @else 
                            <div class="center-info">
                                <span>
                                    Nenhum Contrato Ativo 
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="view-more-box">
                        <div class="view-more-content">
                            @if (isset($contract_selected))
                                <div class="head-infos">
                                    <div class="titles">
                                        <div class="title">
                                            <h2>{{$contract_selected->plan->service->name}}</h2>
                                        </div>
                                        <div class="plano">
                                            <div class="info-plano">
                                                <span><b>Plano:</b> {{$contract_selected->plan->description}}</span>
                                            </div>
                                            <span class="value">
                                                {{$contract_selected->plan->mask_price}}
                                            </span>
                                        </div>
                                        <div class="validade">
                                            <span>
                                                <p><b>Validade:</b> {{$contract_selected->calc_validity()}}</p>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="service-img">
                                        <img src="{{ asset('storage/uploads/pic.svg') }}" alt="">
                                    </div>
                                </div>
                                <div class="add-info">
                                    @php
                                        $tableConfig = [
                                            'hasHead' => True,
                                            'nameTable' => 'Pagamentos',
                                            'hasCreate' => False,
                                            'hasSearch' => True,
                                            'hasModelCE' => True,
                                            'importClientsModule' => False,
                                            'btns' => [
                                                'view' => True,
                                                'edit' => False,
                                                'delete' => False
                                            ]
                                        ];

                                        $show = [
                                            'Data',
                                            'Valor'
                                        ];

                                        $columns = [
                                            'mask_pay_date',
                                            'contract->plan->mask_price'
                                        ];
                                    @endphp
                                    <h4>Pagamentos</h4>
                                    {{-- {{dd($contract_selected->valid_payments)}} --}}
                                    <x-table table="payment" :tableConfig="$tableConfig" :showValues="$show" :columns="$columns" :values="$contract_selected->valid_payments"/>
                                </div>
                            @else 
                                <div class="center-info">
                                    <span>
                                        Nenhum Contrato Selecionado
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
@endsection

@section('js-resources')    
    @vite(['resources/js/app.js', 'resources/js/home.js'])
@endsection



{{-- <div class="access-infos">
                <h2>Informações de Acesso a Plataforma</h2>
                <div class="access-content">
                    <div>
                        <span><b>Usuário: </b> ***************</span>
                        <br>
                        <span><b>Senha: </b> ***************</span>
                    </div>
                    <button class="primary-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                        </svg>
                    </button>
                </div>
            </div> --}}
            {{-- <div class="planos mt-2">
                <h2>Serviços Contratados</h2>
                <div class="cards-content">
                    <div class="card-service">
                        <div class="card-img">
                            <img src=" alt="">
                        </div>
                        <div class="card-cont">
                            <p class="title"></p>
                            <div class="card-foot">
                                <p><b>Vencimento: </b>10/06/2025</p>                                            
                            </div>
                        </div>
                    </div>
                    <div class="card-service">
                        <div class="card-img">
                            <img src="" alt="">
                        </div>
                        <div class="card-cont">
                            <p class="title"></p>
                            <div class="card-foot">
                                <p><b>Vencido: </b>27/04/2025</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}