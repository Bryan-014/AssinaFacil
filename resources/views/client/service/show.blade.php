@extends('layouts.app')

@section('css-resources')
    @vite(['resources/css/reset.css', 'resources/css/components.css', 'resources/css/header.css', 'resources/css/view-service.css'])
@endsection

@section('header')
    @include('layouts.navbar')   
@endsection

@section('aside-links')
    @include('layouts.aside')   
@endsection

@section('cont-box')
    <x-bread-crumb page="Serviços" subPage="Contratar" link="services.list"/>
    <div>
        <div class="mt-2 mb-3">                
            <div class="view">
                <div class="view-content">
                    <div class="service-image">
                        <img src="{{ asset('storage/uploads/pic.svg') }}" alt="">
                    </div>
                    <div class="service-details">
                        <div class="text-content">
                            <p class="title">{{$service->name}}</p>
                            <p class="descricao">{{$service->description}}</p>
                        </div>
                        <div class="price-content">
                            <p class="value-info">{{$service->base_plan->mask_price}}</p>
                        </div>
                    </div>
                </div>
                <div class="view-planos">
                    @foreach ($service->plans as $plan)
                        <div class="plano">
                            <div class="head-plano">
                                @php
                                    switch ($plan->duration_type) {
                                        case 'Diário':
                                            $modality = $plan->duration < 2 ? 'Dia' : 'Dias';
                                            break;
                                        case 'Semanal':
                                            $modality = $plan->duration < 2 ? 'Semana' : 'Semanas';
                                            break;
                                        case 'Mensal':
                                            $modality = $plan->duration < 2 ? 'Mês' : 'Mêses';
                                            break;
                                        case 'Anual':
                                            $modality = $plan->duration < 2 ? 'Ano' : 'Anos';
                                            break;
                                        
                                        default:
                                            $modality = ''; 
                                            break;
                                    }
                                @endphp
                                <div class="duracao">{{$plan->duration}} {{$modality}}</div>
                                <div class="descricao">{{$plan->description}}</div>
                            </div>
                            <div class="assinatura-content">
                                <div class="value-content">
                                    <span class="value">{{$plan->mask_price}}</span>
                                </div>
                                <form action="{{route('contract.store', ['plan_id' => $plan->id,])}}" method="post">
                                    @csrf
                                    <input type="submit" value="Assinar" class="secundary-btn">
                                </form>
                            </div>
                        </div>                            
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-resources')    
    @vite(['resources/js/app.js', 'resources/js/home.js'])
@endsection
