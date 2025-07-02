@php
    if (isset($tableConfig['addParams'])) {
        $addParams = [$tableConfig['addParams']['name'] => $tableConfig['addParams']['value']];
    } else {
        $addParams = [];
    }
    
    
    if (is_object($values) && method_exists($values, 'links')) {
        $contValues = $values->count();        
    } else {
        $contValues = count($values);        
    }
@endphp
<div>
    @if ($tableConfig['hasHead'])
        <div class="head-table">
            @if (!$tableConfig['hasModelCE'])
                @if ($tableConfig['hasCreate'])
                    <a href="{{ route($table.'.create', $addParams) }}" class="primary-btn mt-2">Cadastrar {{$tableConfig['nameTable']}}</a>     
                @endif
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
                            <form action="{{ route('clients.store') }}" method="POST">
                                @csrf                            
                                <div class="modal-body">
                                    <x-primary-input type="text" name="user" label="Nome" :messages="$errors->get('user')" :oldValue="old('user')"/>
                                    <x-primary-input type="email" name="email" label="Email" :messages="$errors->get('email')" :oldValue="old('email')"/>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="danger-btn" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="primary-btn">Cadastrar</button>
                                </div>
                            </form>
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
        @if ($contValues > 0)            
            @for ($i = 0; $i < $contValues; $i++)
                <div class="tbl-row {{$i % 2 == 0 ? '' : 'row-stripe'}}">
                    @php
                        $labelDel = '';
                    @endphp
                    @for ($j = 0; $j < count($columns); $j++)
                        <div class="tbl-cont {{$j != 0 ? 'center' : '' }}">
                            @php

                                $current = $values[$i];
                                foreach (explode('->', $columns[$j]) as $segment) {
                                    if (is_object($current)) {
                                        if (isset($current->{$segment})) {
                                            $current = $current->{$segment};
                                        } elseif (method_exists($current, $segment) || is_callable([$current, $segment])) {
                                            $current = $current->{$segment}();
                                        } else {
                                            $current = null;
                                            break;
                                        }
                                    } else {
                                        $current = null;
                                        break;
                                    }
                                }
                                echo $current;

                                if ($labelDel == '') {
                                    $labelDel = $current;
                                }
                            @endphp
                        </div>                        
                    @endfor
                    <div class="tbl-cont center cont-crud">
                        @if (!isset($tableConfig['addParams']))
                            @if (!isset($tableConfig['btns']) || $tableConfig['btns']['view'])
                                <a href="{{ route($table.'.show', ['id' => $values[$i]->id]) }}" class="tbl-btn-crud crud-view"></a>
                            @endif
                            @if (!isset($tableConfig['btns']) || $tableConfig['btns']['edit'])
                                @if (!$tableConfig['hasModelCE'])
                                    <a href="{{ route($table.'.edit', ['id' => $values[$i]->id]) }}" class="tbl-btn-crud crud-updt"></a>
                                @else
                                    <a class="tbl-btn-crud crud-updt"  data-bs-toggle="modal" data-bs-target="#editClient{{$values[$i]->id}}"></a>
                                    <div class="modal fade" id="editClient{{$values[$i]->id}}" tabindex="-1" aria-labelledby="editClientLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editClientLabel">Editar Cliente</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{route('clients.update', ['id' => $values[$i]->id])}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$values[$i]->id}}">
                                                    <div class="modal-body">
                                                        <x-primary-input type="text" name="user" label="Nome" :messages="$errors->get('user')" :oldValue="$values[$i]->user"/>
                                                        <x-primary-input type="email" name="email" label="Email" :messages="$errors->get('email')" :oldValue="$values[$i]->email"/>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="danger-btn" data-bs-dismiss="modal">Fechar</button>
                                                        <button type="submit" class="primary-btn">Editar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> 
                                @endif
                            @endif
                            @if (!isset($tableConfig['btns']) || $tableConfig['btns']['delete'])
                                <a class="tbl-btn-crud crud-delt"  data-bs-toggle="modal" data-bs-target="#delt{{$values[$i]->id}}"></a>
                                <div class="modal fade" id="delt{{$values[$i]->id}}" tabindex="-1" aria-labelledby="deltLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deltLabel">Excluir {{$tableConfig['nameTable']}}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Você tem certeza que deseja escluir o <b>{{$tableConfig['nameTable']}} {{$labelDel}}</b>
                                            </div>
                                            <form action="{{Route($table.'.destroy', ['id' => $values[$i]->id])}}" method="POST">
                                                @csrf
                                                <div class="modal-footer">
                                                    <button type="button" class="danger-btn" data-bs-dismiss="modal">Fechar</button>
                                                    <button type="submit" class="primary-btn">Excluir</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                            @endif
                        @else
                            @if (!isset($tableConfig['btns']) || $tableConfig['btns']['view'])
                                <a href="{{ route($table.'.show', ['id' => $values[$i]->id, $tableConfig['addParams']['name'] => $tableConfig['addParams']['value']]) }}" class="tbl-btn-crud crud-view"></a>
                            @endif
                            @if (!isset($tableConfig['btns']) || $tableConfig['btns']['edit'])
                                @if (!$tableConfig['hasModelCE'])
                                    <a href="{{ route($table.'.edit', ['id' => $values[$i]->id, $tableConfig['addParams']['name'] => $tableConfig['addParams']['value']]) }}" class="tbl-btn-crud crud-updt"></a>
                                @else
                                    <a class="tbl-btn-crud crud-updt"  data-bs-toggle="modal" data-bs-target="#editClient{{$values[$i]->id}}"></a>
                                    <div class="modal fade" id="editClient{{$values[$i]->id}}" tabindex="-1" aria-labelledby="editClientLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editClientLabel">Editar Cliente</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{route('clients.update', ['id' => $values[$i]->id])}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$values[$i]->id}}">
                                                    <div class="modal-body">
                                                        <x-primary-input type="text" name="users" label="Nome" :messages="$errors->get('users')" :oldValue="$values[$i]->user"/>
                                                        <x-primary-input type="email" name="email" label="Email" :messages="$errors->get('email')" :oldValue="$values[$i]->email"/>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="danger-btn" data-bs-dismiss="modal">Fechar</button>
                                                        <button type="submit" class="primary-btn">Editar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> 
                                @endif
                            @endif
                            @if (!isset($tableConfig['btns']) || $tableConfig['btns']['delete'])
                                <a class="tbl-btn-crud crud-delt"  data-bs-toggle="modal" data-bs-target="#delt{{$values[$i]->id}}"></a>
                                <div class="modal fade" id="delt{{$values[$i]->id}}" tabindex="-1" aria-labelledby="deltLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deltLabel">Excluir {{$tableConfig['nameTable']}}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Você tem certeza que deseja escluir o <b>{{$tableConfig['nameTable']}} {{$labelDel}}</b>
                                            </div>
                                            <form action="{{Route($table.'.destroy', ['id' => $values[$i]->id, $tableConfig['addParams']['name'] => $tableConfig['addParams']['value']])}}" method="POST">
                                                @csrf
                                                <div class="modal-footer">
                                                    <button type="button" class="danger-btn" data-bs-dismiss="modal">Fechar</button>
                                                    <button type="submit" class="primary-btn">Excluir</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> 
                            @endif
                        @endif
                    </div>
                </div>
            @endfor 
        @else
            <div class="tbl-row center m-2">
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
            @if (is_object($values) && method_exists($values, 'links'))
                {{ $values->links('vendor.pagination.custom') }}
            @endif
        </div>
    </div>
</div>