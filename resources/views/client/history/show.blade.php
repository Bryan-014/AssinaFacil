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
    <x-bread-crumb page="Histórico" subPage="Visualizar Pagamento" link="payments.history"/>
    <div>
        <div class="cont">
            <br>
            <div class="wrapper-flex">
                <span><b>Serviço: </b>{{$payment->contract->plan->service->name}}</span>
                <span><b>Plano: </b>{{$payment->contract->plan->description}}</span>
            </div>
            <br>
            <div class="wrapper-flex">
                <span><b>Data do Pagamento: </b>{{$payment->mask_pay_date}}</span>
                <span><b>Valor: </b>{{$payment->contract->plan->mask_price}}</span>                
            </div>   
        </div>
    </div>
@endsection

@section('js-resources')    
    @vite(['resources/js/app.js', 'resources/js/home.js'])
@endsection
