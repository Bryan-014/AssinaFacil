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
                <a href="edit.html" class="primary-btn mt-2">Editar Serviço</a> 
                <div class="complete-view">
                    <div class="view-content">
                        <div class="service-image">
                            <img src="../../../img/service/iptv.png" alt="">
                        </div>
                        <div class="service-details">
                            <div class="text-content">
                                <p class="title">IPTV</p>
                                <p class="descricao">Acesso às mídias digitais mais curtidas</p>
                            </div>
                            <div class="price-content">
                                <p class="value-info">R$ 35.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="view-planos">
                        <div class="plano">
                            <div class="head-plano">
                                <div class="duracao">30 Dias</div>
                                <div class="descricao">Plano Mensal</div>
                            </div>
                            <div class="assinatura-content">
                                <div class="value-content">
                                    <span class="value">R$ 35,00</span>
                                </div>
                                <button class="secundary-btn">Editar</button>
                            </div>
                        </div>
                        <div class="plano">
                            <div class="head-plano">
                                <div class="duracao">90 Dias</div>
                                <div class="descricao">Plano Trimestral</div>
                            </div>
                            <div class="assinatura-content">
                                <div class="value-content">
                                    <span class="value">R$ 100,00</span>
                                </div>
                                <button class="secundary-btn">Editar</button>
                            </div>
                        </div>
                        <div class="plano">
                            <div class="head-plano">
                                <div class="duracao">180 Dias</div>
                                <div class="descricao">Plano Semestral</div>
                            </div>
                            <div class="assinatura-content">
                                <div class="value-content">
                                    <span class="value">R$ 180,00</span>
                                </div>
                                <button class="secundary-btn">Editar</button>
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
