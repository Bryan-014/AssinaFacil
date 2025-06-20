<div class="position-alert">
    <div id="down-alert" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">
                @if (session('alert')['title'])
                    {{ session('alert')['title'] }}
                @endif      
            </strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">            
            @if (session('alert')['msg'])
                {{ session('alert')['msg'] }}
            @endif            
        </div>
    </div>
    @vite(['resources/js/alert.js'])
</div>