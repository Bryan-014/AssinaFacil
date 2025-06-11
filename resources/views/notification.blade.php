@extends('layouts.app')

@section('css-resources')
    @vite(['resources/css/reset.css', 'resources/css/components.css', 'resources/css/table.css', 'resources/css/header.css', 'resources/css/notifications.css'])
@endsection

@section('header')
    @include('layouts.navbar')   
@endsection

@section('aside-links')
    @include('layouts.aside')   
@endsection

@section('cont-box')
    <x-bread-crumb page="Notificações"/>
    <div class="cont">
        <div class="list-cont">
            <div class="notifications-head"></div>
            <div class="notification-list">
                <div class="notification">
                    <div class="notf-conts">
                        <div class="notf-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                            </svg>
                        </div>
                        <div class="notf-texts">
                            <h3>Pagamento Recebido</h3>
                            <p><b>Bryan</b> efetuou o pagamento.</p>
                        </div>
                    </div>
                    <div class="notf-btns">
                        <a href="" class="action-notification view"></a>
                        <a href="" class="action-notification archive"></a>
                        <a href="" class="action-notification delete"></a>
                    </div>
                </div>
                <div class="notification">
                    <div class="notf-conts">
                        <div class="notf-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-open" viewBox="0 0 16 16">
                                <path d="M8.47 1.318a1 1 0 0 0-.94 0l-6 3.2A1 1 0 0 0 1 5.4v.817l5.75 3.45L8 8.917l1.25.75L15 6.217V5.4a1 1 0 0 0-.53-.882zM15 7.383l-4.778 2.867L15 13.117zm-.035 6.88L8 10.082l-6.965 4.18A1 1 0 0 0 2 15h12a1 1 0 0 0 .965-.738ZM1 13.116l4.778-2.867L1 7.383v5.734ZM7.059.435a2 2 0 0 1 1.882 0l6 3.2A2 2 0 0 1 16 5.4V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5.4a2 2 0 0 1 1.059-1.765z"/>
                            </svg>
                        </div>
                        <div class="notf-texts">
                            <h3>Relatório de Pendencias</h3>
                            <p><b>6</b> clientes estão com pagamentos pendentes.</p>
                        </div>
                    </div>
                    <div class="notf-btns">
                        <a href="" class="action-notification view"></a>
                        <a href="" class="action-notification archive"></a>
                        <a href="" class="action-notification delete"></a>
                    </div>
                </div>
                <div class="notification">
                    <div class="notf-conts">
                        <div class="notf-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                            </svg>
                        </div>
                        <div class="notf-texts">
                            <h3>Pagamento Recebido</h3>
                            <p><b>Everton</b> efetuou o pagamento.</p>
                        </div>
                    </div>
                    <div class="notf-btns">
                        <a href="" class="action-notification view"></a>
                        <a href="" class="action-notification archive"></a>
                        <a href="" class="action-notification delete"></a>
                    </div>
                </div>
                <div class="notification">
                    <div class="notf-conts">
                        <div class="notf-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                            </svg>
                        </div>
                        <div class="notf-texts">
                            <h3>Cancelamento de Plano</h3>
                            <p><b>João</b> cancelou o plano trimestral.</p>
                        </div>
                    </div>
                    <div class="notf-btns">
                        <a href="" class="action-notification view"></a>
                        <a href="" class="action-notification archive"></a>
                        <a href="" class="action-notification delete"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="notification-box">
            <div class="notification-content">
                <h1>Relatório de Pendencias</h1>
                <p>Bom dia Marcio, o relatórios de pendencias da semana foi gerado. <b>6</b> clientes estão com pagamentos pendentes, confira: </p>
                <div class="table-content">
                    <div class="tbl-row">
                        <div class="tbl-head">Cliente</div>
                        <div class="tbl-head">Serviço</div>
                        <div class="tbl-head"></div>
                    </div>
                    <div class="tbl-row">
                        <div class="tbl-cont">Lucas Andrade</div>
                        <div class="tbl-cont">IPTV - Ao Vivo</div>
                        <div class="tbl-cont center">
                            <a href="./clientes/view.html" class="tbl-btn">Ver Mais</a>
                        </div>
                    </div>
                    <div class="tbl-row row-stripe">
                        <div class="tbl-cont">Mariana Tavares</div>
                        <div class="tbl-cont">IPTV</div>
                        <div class="tbl-cont center">
                            <a href="" class="tbl-btn">Ver Mais</a>
                        </div>
                    </div>
                    <div class="tbl-row">
                        <div class="tbl-cont">Diego Moreira</div>
                        <div class="tbl-cont">IPTV - Ao Vivo</div>
                        <div class="tbl-cont center">
                            <a href="" class="tbl-btn">Ver Mais</a>
                        </div>
                    </div>
                    <div class="tbl-row row-stripe">
                        <div class="tbl-cont">Camila Nunes</div>
                        <div class="tbl-cont">IPTV - Séries</div>
                        <div class="tbl-cont center">
                            <a href="" class="tbl-btn">Ver Mais</a>
                        </div>
                    </div>
                    <div class="tbl-row">
                        <div class="tbl-cont">Rafael Costa</div>
                        <div class="tbl-cont">IPTV - Filmes</div>
                        <div class="tbl-cont center">
                            <a href="" class="tbl-btn">Ver Mais</a>
                        </div>
                    </div>
                    <div class="tbl-row row-stripe">
                        <div class="tbl-cont">Bianca Martins</div>
                        <div class="tbl-cont">IPTV</div>
                        <div class="tbl-cont center">
                            <a href="" class="tbl-btn">Ver Mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-resources')    
    @vite(['resources/js/app.js', 'resources/js/home.js'])
@endsection
