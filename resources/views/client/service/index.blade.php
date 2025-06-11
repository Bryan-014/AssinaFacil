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
                <div class="card-service">
                    <div class="card-img">
                        <img src="../../../img/service/iptv.png" alt="">
                    </div>
                    <div class="card-cont">
                        <p class="title">IPTV</p>
                        <div class="card-foot">
                            <p class="value-info">R$ 35.00</p>
                            <div class="card-link">
                                <a href="more.html" class="secundary-btn">Ver Mais</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-service">
                    <div class="card-img">
                        <img src="../../../img/service/vivo.png" alt="">
                    </div>
                    <div class="card-cont">
                        <p class="title">IPTV - Ao Vivo</p>
                        <div class="card-foot">
                            <p class="value-info">R$ 15.00</p>
                            <div class="card-link">
                                <a href="" class="secundary-btn">Ver Mais</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-service">
                    <div class="card-img">
                        <img src="../../../img/service/filme.png" alt="">
                    </div>
                    <div class="card-cont">
                        <p class="title">IPTV - Filmes</p>
                        <div class="card-foot">
                            <p class="value-info">R$ 15.00</p>
                            <div class="card-link">
                                <a href="" class="secundary-btn">Ver Mais</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-service">
                    <div class="card-img">
                        <img src="../../../img/service/serie.png" alt="">
                    </div>
                    <div class="card-cont">
                        <p class="title">IPTV - Séries</p>
                        <div class="card-foot">
                            <p class="value-info">R$ 15.00</p>
                            <div class="card-link">
                                <a href="" class="secundary-btn">Ver Mais</a>
                            </div>
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
