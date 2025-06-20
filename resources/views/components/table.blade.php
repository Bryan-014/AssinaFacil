@php
    if (isset($tableConfig['addParams'])) {
        $addParams = [$tableConfig['addParams']['name'] => $tableConfig['addParams']['value']];
    } else {
        $addParams = [];
    }
@endphp
<div>
    @if ($tableConfig['hasHead'])
        <div class="head-table">
            @if (!$tableConfig['hasModelCE'])
                <a href="{{ route($table.'.create', $addParams) }}" class="primary-btn mt-2">Cadastrar {{$tableConfig['nameTable']}}</a>     
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
                {{-- <div>
                    <div class="primary-input">
                        <div>
                            <input type="text" placeholder=" " name="search" id="search">                            
                            <label for="search">Pesquisar</label>
                        </div>
                    </div>
                </div> --}}
            @endif
        </div>
    @endif
    <div class="table-content mt-2">
        <div class="tbl-row">
            @foreach ($showValues as $column)                
                <div class="tbl-head">{{$column}}</div>
            @endforeach
            <div class="tbl-head"></div>
        </div>
        @if ($values->count() > 0)            
            @for ($i = 0; $i < $values->count(); $i++)
                <div class="tbl-row {{$i % 2 == 0 ? '' : 'row-stripe'}}">
                    @for ($j = 0; $j < count($columns); $j++)
                        <div class="tbl-cont {{$j != 0 ? 'center' : '' }}">
                            @php
                                echo($values[$i]->{$columns[$j]})
                            @endphp
                        </div>                        
                    @endfor
                    <div class="tbl-cont center cont-crud">
                        @if (!isset($tableConfig['addParams']))
                            <a href="{{ route($table.'.show', ['id' => $values[$i]->id]) }}" class="tbl-btn-crud crud-view"></a>
                            <a href="{{ route($table.'.edit', ['id' => $values[$i]->id]) }}" class="tbl-btn-crud crud-updt"></a>
                            <form action="{{ Route($table.'.destroy', ['id' => $values[$i]->id]) }}" method="post">
                                @csrf
                                <input class="tbl-btn-crud crud-delt" type="submit" value="">
                            </form>
                        @else
                            <a href="{{ route($table.'.show', ['id' => $values[$i]->id, $tableConfig['addParams']['name'] => $tableConfig['addParams']['value']]) }}" class="tbl-btn-crud crud-view"></a>
                            <a href="{{ route($table.'.edit', ['id' => $values[$i]->id, $tableConfig['addParams']['name'] => $tableConfig['addParams']['value']]) }}" class="tbl-btn-crud crud-updt"></a>
                            <form action="{{ Route($table.'.destroy', ['id' => $values[$i]->id, $tableConfig['addParams']['name'] => $tableConfig['addParams']['value']]) }}" method="post">
                                @csrf
                                <input class="tbl-btn-crud crud-delt" type="submit" value="">
                            </form>
                        @endif
                    </div>
                </div>
            @endfor 
        @else
            <div class="tbl-row center p-2">
                Nenhum registro encontrado
            </div>
        @endif
    </div>
    <div class="table-content-foot">
        {{-- <div class="primary-select">
            <div>
                <select name="numData" id="numData">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>                            
                <label for="numData">Dados por Página</label>
            </div>
        </div> --}}
        <div class="pagination-btns">
            {{ $values->links('vendor.pagination.custom') }}
        </div>
    </div>
</div>