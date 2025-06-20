<div class="primary-input">
    <div>
        <select name="{{$name}}" id="{{$name}}">
            <option value="">{{$label}}</option>
            {{$slot}}
        </select>
    </div>
    <p id="response-{{$name}}">
        @if ($messages)
            @foreach ((array) $messages as $message)
                {{ $message }}
            @endforeach
        @endif
    </p>
</div>