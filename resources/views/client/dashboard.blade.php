@extends('layouts.app')

@section('css-resources')
    @vite(['resources/css/reset.css', 'resources/css/components.css', 'resources/css/header.css'])
@endsection

@section('header')
    @include('layouts.navbar')   
@endsection

@section('aside-links')
    @include('layouts.aside')   
@endsection

@section('cont-box')
    <x-bread-crumb/>
    <div class="my-services">
        <div class="list-cont">
            @if (count($contracts) != 0) 
                @foreach ($contracts as $contract)
                    <a class="service-link" href="{{route('client.contract', ['contract_id' => $contract->id])}}">
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
                                    <span><b>Plano:</b> {{$contract_selected->plan->duration_type}}</span>
                                </div>
                                <span class="value">
                                    R$ {{ number_format($contract_selected->plan->price, 2, ',', '.') }}
                                </span>
                            </div>
                            <div class="validade">
                                <span>
                                    <p><b>Validade:</b> 10/05/2025</p>
                                </span>
                            </div>
                        </div>
                        <div class="service-img">
                            <img src="{{ asset('storage/uploads/pic.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="add-info">
                        {{-- <h3>Informações Adicionais</h3> --}}
                        {{-- <br> --}}
                        {{-- <span><b>//campo</b>//value</span> --}}
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
@endsection

@section('js-resources')    
    @vite(['resources/js/app.js', 'resources/js/home.js'])
@endsection
    
        {{-- <span class="valor">R$ {{ number_format($contract->plan->price, 2, ',', '.') }}</span>          --}}
