@if (isset($data))
    <div class="steps">
        @for ($i = 0; $i < count($data)  ; $i++)
            <div class="step step-{{$data[$i]["status"]}}">
                <div class="num-step">
                    {{$i+1}}
                </div>
                <div class="label-step">
                    {{$data[$i]["name"]}}
                </div>
            </div>
            @if ($i != (count($data) -  1)) 
                <div class="mid-step">
                    @for ($j = 0; $j < 3; $j++)
                        <div class="point"></div>
                    @endfor
                </div>
            @endif
        @endfor
    </div>
@endif