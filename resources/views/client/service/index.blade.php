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
    <x-bread-crumb page="Serviços"/>
    <div>
        <div class="cont">
            <div class="cards-content">
                @if (count($services) != 0)
                    @foreach($services as $service) 
                        <x-service-card :img="$service->url_image" :name="$service->name" :price="$service->base_plan->mask_price" :id="$service->id" />
                    @endforeach
                @else
                    <div class="center-info">
                        <span>
                            Nenhum Serviço Encontrado 
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
