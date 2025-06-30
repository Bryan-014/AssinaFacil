@extends('layouts.app')

@section('css-resources')
    @vite(['resources/css/reset.css', 'resources/css/components.css', 'resources/css/header.css', 'resources/css/table.css'])
@endsection

@section('header')
    @include('layouts.navbar')   
@endsection

@section('aside-links')
    @include('layouts.aside')   
@endsection

@section('cont-box')
    <x-bread-crumb page="Pendências"/>
    <div>
        <div class="cont">
            <div class="d-flex mb-3 mt-2">
                <div class="list-cont">
                    @if (count($contracts) != 0) 
                    <div class="pend-services-container">
                            @foreach ($contracts as $contract)
                                <div class="pend-service" id="redirect-cont{{$contract->id}}">
                                    <div class="img-service">
                                        <img src="{{asset('storage/uploads/pic.svg')}}" alt="">
                                    </div>
                                    <div class="vert-center">
                                        <div class="services-texts">
                                            <div class="title">
                                                <h3>{{$contract->plan->service->name}}</h3>
                                            </div>
                                            <div class="subtitles">
                                                <span class="vencimento">
                                                    <b>Vencimento: </b> {{$contract->calc_validity()}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="value-content">
                                        <span class="valor">{{$contract->plan->mask_price}}</span>
                                    </div>
                                </div>      
                                <script>
                                    document.querySelector('#redirect-cont{{$contract->id}}').addEventListener('click', () => {
                                        window.location.href = "{{ route('pending.show', ['id' => $contract->id]) }}";
                                    });  
                                </script>                  
                            @endforeach
                        </div>
                    @else 
                        <div class="center-info">
                            <span>
                                Nenhuma Pendência Encontrada 
                            </span>
                        </div>
                    @endif
                </div>
                <div class="view-more-box">
                    <div class="view-more-content">
                        @if (isset($contract_select))
                            <div class="head-infos">
                                <div class="titles">
                                    <div class="title">
                                        <h2>{{$contract_select->plan->service->name}}</h2>
                                    </div>
                                    <div class="plano">
                                        <div class="info-plano">
                                            <span><b>Plano:</b> {{$contract_select->plan->duration_type}}</span>
                                        </div>
                                        <span class="value">
                                            {{$contract_selected->plan->mask_price}}
                                        </span>
                                    </div>
                                    <div class="validade">
                                        <span>
                                            <p><b>Validade:</b> {{$contract_select->calc_validity()}}</p>
                                        </span>
                                    </div>
                                    <div class="center-btn">
                                        <form action="{{route('payments.store', ['contract_id' => $contract_select->id])}}" method="post">
                                            @csrf
                                            <input type="submit" class="primary-btn" value="Efetuar Pagamento">
                                        </form>
                                    </div>
                                </div>
                                <div class="service-img">
                                    <img src="{{ asset('storage/uploads/pic.svg') }}" alt="">
                                </div>
                            </div>
                        @else
                            <div class="center-info">
                                <span>
                                    Nenhuma Pendência Selecionada 
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-resources')    
    @vite(['resources/js/app.js', 'resources/js/home.js'])
@endsection
