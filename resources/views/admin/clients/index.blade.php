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
    <x-bread-crumb page="Clientes"/>
    <div>
        <div class="cont">
            @php
                $tableConfig = [
                    'hasHead' => True,
                    'nameTable' => 'Cliente',
                    'hasCreate' => True,
                    'hasSearch' => True,
                    'hasModelCE' => True,
                    'importClientsModule' => True,
                    'btns' => [
                        'view' => True,
                        'edit' => False,
                        'delete' => True
                    ]
                ];

                $show = [
                    'Nome'
                ];

                $columns = [
                    'user'
                ];
            @endphp
            <x-table table="clients" :tableConfig="$tableConfig" :showValues="$show" :columns="$columns" :values="$clients" />
        </div>
    </div>
@endsection

@section('js-resources')    
    @vite(['resources/js/app.js', 'resources/js/home.js'])
@endsection

    {{-- <div class="head-table">
        <div>
            <button type="button" class="primary-btn mt-2" data-bs-toggle="modal" data-bs-target="#createClient">
                Cadastrar Cliente
            </button>   
            <button type="button" class="primary-btn mt-2">
                Importar Clientes
            </button>   
        </div>
        <div class="modal fade" id="createClient" tabindex="-1" aria-labelledby="createClientLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createClientLabel">Cadastrar Cliente</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="primary-input">
                            <div>
                                <input type="text" placeholder=" " name="nome" id="nome" value="">
                                <label for="nome">Nome</label>
                            </div>
                            <p id="response-nome"></p>
                        </div>
                        <div class="primary-input">
                            <div>
                                <input type="text" placeholder=" " name="email" id="email" value="">
                                <label for="email">Email</label>
                            </div>
                            <p id="response-email"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="danger-btn" data-bs-dismiss="modal">Fechar</button>
                        <button type="button" class="primary-btn">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>                 
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
            <div class="tbl-cont">Lucas Andrade</div>
            <div class="tbl-cont"></div>
            <div class="tbl-cont center cont-crud">
                <a href="view.html" class="tbl-btn-crud crud-view"></a>
                <a class="tbl-btn-crud crud-updt"  data-bs-toggle="modal" data-bs-target="#editClient"></a>
                <div class="modal fade" id="editClient" tabindex="-1" aria-labelledby="editClientLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editClientLabel">Editar Cliente</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="primary-input">
                                    <div>
                                        <input type="text" placeholder=" " name="nome" id="nome" value="Lucas Andrade">
                                        <label for="nome">Nome</label>
                                    </div>
                                    <p id="response-nome"></p>
                                </div>
                                <div class="primary-input">
                                    <div>
                                        <input type="text" placeholder=" " name="email" id="email" value="lucas.andrade@gmail.com">
                                        <label for="email">Email</label>
                                    </div>
                                    <p id="response-email"></p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="danger-btn" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="primary-btn">Editar</button>
                            </div>
                        </div>
                    </div>
                </div> 
                <a href="" class="tbl-btn-crud crud-delt"></a>
            </div>
        </div>
        <div class="tbl-row row-stripe">
            <div class="tbl-cont">Bryan Rosa</div>
            <div class="tbl-cont"></div>
            <div class="tbl-cont center cont-crud">
                <a href="" class="tbl-btn-crud crud-view"></a>
                <a href="" class="tbl-btn-crud crud-updt"></a>
                <a href="" class="tbl-btn-crud crud-delt"></a>
            </div>
        </div>
        <div class="tbl-row">
            <div class="tbl-cont">Mariana Tavares</div>
            <div class="tbl-cont"></div>
            <div class="tbl-cont center cont-crud">
                <a href="" class="tbl-btn-crud crud-view"></a>
                <a href="" class="tbl-btn-crud crud-updt"></a>
                <a href="" class="tbl-btn-crud crud-delt"></a>
            </div>
        </div>
        <div class="tbl-row row-stripe">
            <div class="tbl-cont">Everton Henrique</div>
            <div class="tbl-cont"></div>
            <div class="tbl-cont center cont-crud">
                <a href="" class="tbl-btn-crud crud-view"></a>
                <a href="" class="tbl-btn-crud crud-updt"></a>
                <a href="" class="tbl-btn-crud crud-delt"></a>
            </div>
        </div>
        <div class="tbl-row">
            <div class="tbl-cont">Diego Moreira</div>
            <div class="tbl-cont"></div>
            <div class="tbl-cont center cont-crud">
                <a href="" class="tbl-btn-crud crud-view"></a>
                <a href="" class="tbl-btn-crud crud-updt"></a>
                <a href="" class="tbl-btn-crud crud-delt"></a>
            </div>
        </div>
        <div class="tbl-row row-stripe">
            <div class="tbl-cont">Camila Nunes</div>
            <div class="tbl-cont"></div>
            <div class="tbl-cont center cont-crud">
                <a href="" class="tbl-btn-crud crud-view"></a>
                <a href="" class="tbl-btn-crud crud-updt"></a>
                <a href="" class="tbl-btn-crud crud-delt"></a>
            </div>
        </div>
        <div class="tbl-row">
            <div class="tbl-cont">Rafael Costa</div>
            <div class="tbl-cont"></div>
            <div class="tbl-cont center cont-crud">
                <a href="" class="tbl-btn-crud crud-view"></a>
                <a href="" class="tbl-btn-crud crud-updt"></a>
                <a href="" class="tbl-btn-crud crud-delt"></a>
            </div>
        </div>
        <div class="tbl-row row-stripe">
            <div class="tbl-cont">Bianca Martins</div>
            <div class="tbl-cont"></div>
            <div class="tbl-cont center cont-crud">
                <a href="" class="tbl-btn-crud crud-view"></a>
                <a href="" class="tbl-btn-crud crud-updt"></a>
                <a href="" class="tbl-btn-crud crud-delt"></a>
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
    </div> --}}