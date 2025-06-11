<a href="{{ Route($name.'.'.$page) }}" class="{{ explode('/', request()->path())[0] == $name ? 'selected' : '' }}">
    <div class="icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-{{$icon}}" viewBox="0 0 16 16">
            {{$slot}}
        </svg>
    </div>
    <p class="navigation-text force-opacity-none">{{$label}}</p>
</a>        