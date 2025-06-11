@php
    if(!isset($margin)) {
        $margin = '';
    }
@endphp
<div class="primary-input ">
    <div>
        <input type="{{$type}}" placeholder=" " name="{{$name}}" id="{{$name}}" value="{{$oldValue}}">                            
        <label for="{{$name}}">{{$label}}</label>
    </div>
    <p id="response-{{$name}}">
        @if ($messages)
            @foreach ((array) $messages as $message)
                {{ $message }}
            @endforeach
        @endif
    </p>
</div>