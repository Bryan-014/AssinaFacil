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
    <x-bread-crumb page="Pendências"/>
    <div>
        <div class="cont">
            <div class="mb-3 mt-2">
                <div class="pend-services-container">
                    <div class="pend-service">
                        <div class="img-service">
                            <img src="../../../img/service/iptv.png" alt="">
                        </div>
                        <div class="services-texts">
                            <div class="title">
                                <h3>IPTV</h3>
                            </div>
                            <div class="subtitles">
                                <span class="vencimento">
                                    <b>Vencimento: </b> 10/06/2025
                                </span>
                                <span class="valor">R$ 35.00</span>
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
