<div class="header">
    <div id="mobile-aside-control"></div>
    <div class="title">
        @php
            $panel = (Auth::user()->role_id == env('ADMIN_ROLE_ID', 'role_id') || Auth::user()->role_id == env('DEALER_ROLE_ID', 'role_id')) ? 'admin' : 'client';
        @endphp
        <a href="{{ Route($panel.'.dashboard') }}">Assina Fácil</a>
    </div>
    <div class="centertitle"></div>
</div>