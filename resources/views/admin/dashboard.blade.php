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
    <x-bread-crumb/>
    <div>
        <div class="cont">
            <div class="main-info">
                <div class="more-info">
                    <div class="list-infos">
                        <div class="info">
                            <h4>Informações de Contratos</h4>
                            <div class="mini-cards">
                                <div class="mini-c suss">
                                    <div class="label">Ativos</div>
                                    <div class="value">{{$contractsInfos['actives']}}</div>
                                </div>
                                <div class="mini-c warn">
                                    <div class="label">A vencer</div>
                                    <div class="value">{{$contractsInfos['toExpired']}}</div>                                    
                                </div>
                                <div class="mini-c dang">                                    
                                    <div class="label">Expirados</div>
                                    <div class="value">{{$contractsInfos['expired']}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chart-services">
                        <div class="def-chart" id="myChart2" style="width: 84%; height: auto; margin-bottom: 6px;"></div>
                    </div>
                </div>
                <div class="chart">
                    <div class="def-chart" id="myChart" style="width:75%; height:350px; margin-bottom: 6px;"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current',{packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            const data = google.visualization.arrayToDataTable([
                ['mes', 'Lucro'],
                @foreach($chartProfit['chartLabels'] as $index => $label)
                    ['{{ $label }}', {{ $chartProfit['chartValues'][$index] }}],
                @endforeach
            ]);

            let isDark = localStorage.getItem('tema') == 'dark' ? true : false;
            
            const options = {
                title: 'Lucro por mês',
                hAxis: {
                    title: 'Mês',
                    titleTextStyle: {
                        color: '#ffffff',  
                        fontSize: 16
                    },
                    baselineColor: '#ffffff',
                    textStyle: {
                        color: '#ffffff',  
                        fontSize: 12
                    }
                },
                vAxis: {
                    title: 'Valor Lucrado',
                    titleTextStyle: {
                        color: '#ffffff',  
                        fontSize: 16
                    },
                    textStyle: {
                        color: '#ffffff',  
                        fontSize: 12
                    },
                    gridlines: {
                        color: '#111122'
                    }
                },
                backgroundColor: '#111122',
                titleTextStyle: {
                    color: '#ffffff'
                },
                legend: {
                    textStyle: {
                        color: '#ffffff',
                        fontSize: 14
                    }
                },
                chartArea: {
                    backgroundColor: '#111122',
                    left: 50,
                    top: 30,
                    width: '60%',
                    height: '70%'
                },
                colors: ['#90caf9' ],
            };
            
            const chart = new google.visualization.LineChart(document.getElementById('myChart'));
            chart.draw(data, options);

            const data2 = google.visualization.arrayToDataTable([
                ['Serviço', 'Contratos'],
                @foreach($chartServices['chartLabels'] as $index => $label)
                    ['{{ $label }}', {{ $chartServices['chartValues'][$index] }}],
                @endforeach
            ]);

            const options2 = {
                title: 'Serviços Mais Contratados',
                is3D: true,
                backgroundColor: isDark ? '#111122' : '#111122',
                titleTextStyle: {
                    color: isDark ? '#ffffff' : '#ffffff'
                },
                legend: {
                    textStyle: {
                        color: isDark ? '#ffffff' : '#ffffff',
                        fontSize: 10
                    }
                },
                chartArea: {
                    backgroundColor: isDark ? '#454554' : '#fff',
                    left: 50,
                    top: 30,
                    width: '60%',
                    height: '70%'
                },
            };

            const chart2 = new google.visualization.PieChart(document.getElementById('myChart2'));
            chart2.draw(data2, options2);
        }
    </script>
@endsection

@section('js-resources')    
    @vite(['resources/js/app.js', 'resources/js/home.js'])
@endsection
