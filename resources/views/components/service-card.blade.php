<div class="card-service">
    <div class="card-img">
        <img src="{{ asset($img) }}" alt="">
    </div>
    <div class="card-cont">
        <p class="title">{{$name}}</p>
        <div class="card-foot">
            <p class="value-info">{{$price}}</p>
            <div class="card-link">
                <a href="{{route('services.view', ['id' => $id])}}" class="secundary-btn">Ver Mais</a>
            </div>
        </div>
    </div>
</div>