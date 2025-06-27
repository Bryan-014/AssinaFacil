@php
    $panelInfo = (Auth::user()->role_id == env('ADMIN_ROLE_ID', 'role_id') || Auth::user()->role_id == env('DEALER_ROLE_ID', 'role_id')) ? ['admin', 'do Administrador'] : ['client', 'do Cliente'];
@endphp
<div class="head-cont">
    <div class="bread-crumb">
        @if (explode('/', request()->path())[0] == 'admin' || explode('/', request()->path())[0] == 'client')
            <div class="act-page">
                Painel {{$panelInfo[1]}} 
            </div>
        @else
            <div class="link-page">
                <a href="{{ Route($panelInfo[0].'.dashboard') }}">Painel {{$panelInfo[1]}}</a>
            </div>
            <div class="mid">></div>
            <div class="{{isset($subPage) ? 'link-page' : 'act-page'}}">
                @if (isset($subPage))
                    @if (isset($linkParam))
                        <a href="{{ Route($link, $linkParam) }}">{{$page}}</a>                
                    @else
                        <a href="{{ Route($link) }}">{{$page}}</a>                
                    @endif
                @else
                    {{$page}}                    
                @endif
            </div>
            @if (isset($subPage))
                <div class="mid">></div>
                <div class="act-page">
                    {{$subPage}}
                </div>
            @endif
        @endif
    </div>
    @if ((explode('/', request()->path())[0] != $panelInfo[0] && !isset($subPage)))
        <a href="{{ Route($panelInfo[0].'.dashboard') }}" class="exit close"></a>
    @endif
    @if (isset($subPage))
        @if (isset($linkParam))
            <a href="{{ Route($link, $linkParam) }}" class="exit back"></a>                
        @else
            <a href="{{ Route($link) }}" class="exit back"></a>                
        @endif
    @endif
</div>