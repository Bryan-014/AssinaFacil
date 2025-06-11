<div class="header">
    <div id="mobile-aside-control"></div>
    <div class="title">
        @if(Auth::user()->role_id == env('ADMIN_ROLE_ID', 'role_id'))
            <a href="{{ Route('admin.dashboard') }}">Assina Fácil</a>
        @elseif (Auth::user()->role_id == env('CLIENT_ROLE_ID', 'role_id'))
            <a href="{{ Route('client.dashboard') }}">Assina Fácil</a>
        @endif
    </div>
    <div class="centertitle"></div>
</div>