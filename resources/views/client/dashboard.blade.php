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
            <div class="my-services">
                <div class="list-cont">
                    <div class="service">
                        <div class="img-service">
                            <img src="../../img/service/iptv.png" alt="">
                        </div>
                        <div class="services-texts">
                            <div class="title">
                                <h3>IPTV</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="view-more-box">
                    <div class="view-more-content">
                        <div class="head-infos">
                            <div class="titles">
                                <div class="title">
                                    <h2>IPTV</h2>
                                </div>
                                <div class="plano">
                                    <div class="info-plano">
                                        <span><b>Plano:</b> Mensal</span>
                                    </div>
                                    <span class="value">
                                        R$ 35.00
                                    </span>
                                </div>
                                <div class="validade">
                                    <span>
                                        <p><b>Validade:</b> 10/05/2025</p>
                                    </span>
                                </div>
                            </div>
                            <div class="service-img">
                                <img src="../../img/service/iptv.png" alt="">
                            </div>
                        </div>
                        <div class="add-info">
                            <h3>Informações Adicionais</h3>
                            <span>
                                <b>Link Web Player: </b> <a href="http://navegadoruniplay.top/switchuser.php">http://navegadoruniplay.top/switchuser.php</a>
                            </span>
                            <br>
                            <span><b>Usuário: </b>usuário123</span>
                            <br>
                            <span><b>Senha: </b>senha123</span>
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
