<div class="head-cont">
    <div class="bread-crumb">
        @if (explode('/', request()->path())[0] == 'admin' || explode('/', request()->path())[0] == 'client')
            @if(Auth::user()->role_id == 'f5504d7f-8f40-4508-907f-48fb119813c6')
                <div class="act-page">
                    Painel Administrador 
                </div>
            @elseif (Auth::user()->role_id == '1e0ba8e6-0c99-4bd3-9e9c-b89f33ed0fe0')
                <div class="act-page">
                    Painel do Cliente
                </div>
            @endif
        @else
            <div class="link-page">
                @if(Auth::user()->role_id == 'f5504d7f-8f40-4508-907f-48fb119813c6')
                    <a href="{{ Route('admin.dashboard') }}">Painel Administrador</a>
                @elseif (Auth::user()->role_id == '1e0ba8e6-0c99-4bd3-9e9c-b89f33ed0fe0')
                    <a href="{{ Route('client.dashboard') }}">Painel do Cliente</a>
                @endif
            </div>
            <div class="mid">></div>
            <div class="{{isset($subPage) ? 'link-page' : 'act-page'}}">
                @if (isset($subPage))
                    <a href="{{ Route($link) }}">{{$page}}</a>                
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
    @if (explode('/', request()->path())[0] != 'admin' || explode('/', request()->path())[0] != 'client')
        @if(Auth::user()->role_id == 'f5504d7f-8f40-4508-907f-48fb119813c6')
            @if ((explode('/', request()->path())[0] != 'admin' && !isset($subPage)))
                <a href="{{ Route('admin.dashboard') }}" class="exit close"></a>
            @endif
        @elseif (Auth::user()->role_id == '1e0ba8e6-0c99-4bd3-9e9c-b89f33ed0fe0')
            @if ((explode('/', request()->path())[0] != 'client' && !isset($subPage)))
                <a href="{{ Route('client.dashboard') }}" class="exit close"></a>
            @endif
        @endif
    @elseif (isset($subPage))
        <a href="{{ Route($link) }}" class="exit back"></a>
    @endif
</div>