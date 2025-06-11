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
            <div class="wrapper-show mt-1">
                <span>
                    <b>Nome:</b> Revendedor 1
                </span>
                <span>
                    <b>Email:</b> revendedor1@gmail.com
                </span>
            </div>
            <div class="head-table">         
                <div>
                    <div class="primary-input">
                        <div>
                            <input type="text" placeholder=" " name="search" id="search">                            
                            <label for="search">Pesquisar</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-content mt-2">
                <div class="tbl-row">
                    <div class="tbl-head">Nome</div>
                    <div class="tbl-head"></div>
                    <div class="tbl-head"></div>
                </div>
                <div class="tbl-row">
                    <div class="tbl-cont">Cliente 1</div>
                    <div class="tbl-cont"></div>
                    <div class="tbl-cont center cont-crud">
                        <a href="" class="tbl-btn-crud crud-view"></a>
                    </div>
                </div>
                <div class="tbl-row row-stripe">
                    <div class="tbl-cont">Cliente 2</div>
                    <div class="tbl-cont"></div>
                    <div class="tbl-cont center cont-crud">
                        <a href="" class="tbl-btn-crud crud-view"></a>
                    </div>
                </div>
                <div class="tbl-row">
                    <div class="tbl-cont">Cliente 3</div>
                    <div class="tbl-cont"></div>
                    <div class="tbl-cont center cont-crud">
                        <a href="" class="tbl-btn-crud crud-view"></a>
                    </div>
                </div>
                <div class="tbl-row row-stripe">
                    <div class="tbl-cont">Cliente 4</div>
                    <div class="tbl-cont"></div>
                    <div class="tbl-cont center cont-crud">
                        <a href="" class="tbl-btn-crud crud-view"></a>
                    </div>
                </div>
                <div class="tbl-row">
                    <div class="tbl-cont">Cliente 5</div>
                    <div class="tbl-cont"></div>
                    <div class="tbl-cont center cont-crud">
                        <a href="" class="tbl-btn-crud crud-view"></a>
                    </div>
                </div>
                <div class="tbl-row row-stripe">
                    <div class="tbl-cont">Cliente 6</div>
                    <div class="tbl-cont"></div>
                    <div class="tbl-cont center cont-crud">
                        <a href="" class="tbl-btn-crud crud-view"></a>
                    </div>
                </div>
                <div class="tbl-row">
                    <div class="tbl-cont">Cliente 7</div>
                    <div class="tbl-cont"></div>
                    <div class="tbl-cont center cont-crud">
                        <a href="" class="tbl-btn-crud crud-view"></a>
                    </div>
                </div>
                <div class="tbl-row row-stripe">
                    <div class="tbl-cont">Cliente 8</div>
                    <div class="tbl-cont"></div>
                    <div class="tbl-cont center cont-crud">
                        <a href="" class="tbl-btn-crud crud-view"></a>
                    </div>
                </div>
            </div>
            <div class="table-content-foot">
                <div class="primary-select">
                    <div>
                        <select name="numData" id="numData">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>                            
                        <label for="numData">Dados por Página</label>
                    </div>
                </div>
                <div class="pagination-btns">
                    <input type="button" value="" class="pagination-back-all">
                    <input type="button" value="" class="pagination-back">
                    <input type="button" value="1" class="pagination">
                    ...
                    <input type="button" value="5" class="pagination">
                    <input type="button" value="6" class="pagination selected">
                    <input type="button" value="7" class="pagination">
                    ...
                    <input type="button" value="10" class="pagination">
                    <input type="button" value="" class="pagination-up">
                    <input type="button" value="" class="pagination-up-all">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-resources')    
    @vite(['resources/js/app.js', 'resources/js/home.js'])
@endsection
