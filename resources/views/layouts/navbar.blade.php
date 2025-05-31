<div class="header">
    <div id="mobile-aside-control"></div>
    <div class="title">
        @if(Auth::user()->role_id == 'f5504d7f-8f40-4508-907f-48fb119813c6')
            <a href="{{ Route('admin.dashboard') }}">Assina Fácil</a>
        @elseif (Auth::user()->role_id == '1e0ba8e6-0c99-4bd3-9e9c-b89f33ed0fe0')
            <a href="{{ Route('client.dashboard') }}">Assina Fácil</a>
        @endif
    </div>
    <div class="centertitle"></div>
</div>