<div>
    @if ($tableConfig['hasHead'])
        <div class="head-table">
            @if (!$tableConfig['hasModelCE'])
                <a href="{{ route($table.'.create') }}" class="primary-btn mt-2">Cadastrar {{$tableConfig['nameTable']}}</a>     
            @else
                <div>
                    @if ($tableConfig['hasCreate'])
                        <button type="button" class="primary-btn mt-2" data-bs-toggle="modal" data-bs-target="#create{{$table}}">
                            Cadastrar {{$tableConfig['nameTable']}}
                        </button>                    
                    @endif
                    @if ($tableConfig['importClientsModule'])
                        <button type="button" class="primary-btn mt-2">
                            Importar Clientes
                        </button>  
                    @endif
                </div>
                <div class="modal fade" id="create{{$table}}" tabindex="-1" aria-labelledby="create{{$table}}Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="create{{$table}}Label">Cadastrar {{$tableConfig['nameTable']}}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{$slot}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="danger-btn" data-bs-dismiss="modal">Fechar</button>
                                <button type="button" class="primary-btn">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($tableConfig['hasSearch'])
                <div>
                    <div class="primary-input">
                        <div>
                            <input type="text" placeholder=" " name="search" id="search">                            
                            <label for="search">Pesquisar</label>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endif
    <div class="table-content mt-2">
        <div class="tbl-row">
            <div class="tbl-head">Serviço</div>
            <div class="tbl-head">Valor</div>
            <div class="tbl-head"></div>
        </div>
        @if (count($values) == 0) 
            <div class="tbl-row center p-2">
                Nenhum registro encontrado
            </div>
        @endif
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