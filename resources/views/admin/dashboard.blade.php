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
                                    <div class="value">0</div>
                                </div>
                                <div class="mini-c warn">
                                    <div class="label">A vencer</div>
                                    <div class="value">0</div>                                    
                                </div>
                                <div class="mini-c dang">                                    
                                    <div class="label">Expirados</div>
                                    <div class="value">0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chart-services">
                        <div class="def-chart" id="myChart2" style="width: 84%; height: auto; margin-bottom: 6px;"></div>
                    </div>
                </div>
                <div class="chart">
                    <div class="def-chart" id="myChart" style="width:82%; height:350px; margin-bottom: 6px;"></div>
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
                ['mes', 'Clientes'],
                ['Jan',5],['Fev',8],['Mar',8],['Abr',9],['Mai',12], ['Jun', 10], ['Jul', 11]
            ]);

            let isDark = localStorage.getItem('tema') == 'dark' ? true : false;
            
            const options = {
                title: 'Clientes ativos por mês',
                hAxis: {
                    title: 'Mês',
                    titleTextStyle: {
                        color: isDark ? '#fff' : '#000',  
                        fontSize: 16
                    },
                    baselineColor: isDark ? '#fff' : '#000',
                    textStyle: {
                        color: isDark ? '#fff' : '#000',  
                        fontSize: 12
                    }
                },
                vAxis: {
                    title: 'Clientes ativos',
                    titleTextStyle: {
                        color: isDark ? '#fff' : '#000',  
                        fontSize: 16
                    },
                    textStyle: {
                        color: isDark ? '#fff' : '#000',  
                        fontSize: 12
                    }
                },
                backgroundColor: isDark ? '#454554' : '#ffffff',
                titleTextStyle: {
                    color: isDark ? '#ffffff' : '#000000'
                },
                legend: {
                    textStyle: {
                        color: isDark ? '#cccccc' : '#333333',
                        fontSize: 14
                    }
                },
                chartArea: {
                    backgroundColor: isDark ? '#454554' : '#fff',
                    left: 50,
                    top: 30,
                    width: '60%',
                    height: '70%'
                },
                colors: isDark
                    ? ['#90caf9', '#f48fb1', '#a5d6a7']
                    : ['#1e88e5', '#e91e63', '#43a047'],
            };
            
            const chart = new google.visualization.LineChart(document.getElementById('myChart'));
            chart.draw(data, options);

            const data2 = google.visualization.arrayToDataTable([
                ['Serviço', 'Contratos'],
                ['IPTV', 55],
                ['IPTV - Filmes', 49],
                ['IPTV - Séries', 44],
                ['IPTV - Ao Vivo', 24]
            ]);

            // Set Options
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

            // Draw
            const chart2 = new google.visualization.PieChart(document.getElementById('myChart2'));
            chart2.draw(data2, options2);
        }

        document.querySelector('#modoToggle').addEventListener('change', () => {
            document.getElementById('myChart').innerHTML = '';
            drawChart();
        })
    </script>
@endsection

@section('js-resources')    
    @vite(['resources/js/app.js', 'resources/js/home.js'])
@endsection
