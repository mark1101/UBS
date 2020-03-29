<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="{{asset('img/log.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        cUBS
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="{{asset('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons')}}"/>

    <!-- CSS Arquivos -->
    <link href="{{asset('css/material-dashboard.css')}}" rel="stylesheet"/>
</head>

<body class="" style="background-color: white">
<div class="wrapper ">

    <div class="sidebar" data-color="admin" data-background-color="white" data-image="../assets/img/unidade.jpg">
        <div class="logo"><a href="{{'/'}}" class="simple-text logo-normal">
                <img src="{{asset('img/adm.png')}}">
            </a></div>
        <div class="sidebar-wrapper ">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="{{'/'}}">
                        <i class="material-icons">home_work</i>
                        <p>Início</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">
                        <i class="material-icons">arrow_right_alt
                        </i>
                        <p>Encaminhamentos</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">
                        <i class="material-icons">attach_file
                        </i>
                        <p>Recados</p>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link" href="#">
                        <i class="material-icons">commute
                        </i>
                        <p>Dados de viagens</p>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link" href="{{route('cadastroLocalidade')}}">
                        <i class="material-icons">house
                        </i>
                        <p>Cadastro Localidade</p>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link" href="{{route('cadastraProfissional')}}">
                        <i class="material-icons">person
                        </i>
                        <p>Cadastrar Profissionais</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cadastroMotorista')}}">
                        <i class="material-icons">directions_car
                        </i>
                        <p>Gestão de Viagens</p>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <i class="material-icons">history
                        </i>
                        <p>Dados Gráficos</p>
                    </a>
                </li>
            </ul>

        </div>
    </div>

    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">

                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:;">Gerenciamento de Motoristas e Automoveis</a>
                </div>

                <!-- BOTAO DE RESPONSIVIDADE PARA OPCIOES DE SIDEBAR-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>

                <!-- TOPO EM CIMA PARA OPCAO DE SAIDA E CONFIGURAÇÃOES DE PERFIL E SISTEMA  -->
                <div class="collapse navbar-collapse justify-content-end">
                    <form class="navbar-form"></form>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a style="color: #f8f9fa" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{Auth::user()->funcao}} {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Sair') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
        <!-- End Navbar -->

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Year', 'Sales', 'Expenses', 'Profit'],
                                ['2014', 1000, 400, 200],
                                ['2015', 1170, 460, 250],
                                ['2016', 660, 1120, 300],
                                ['2017', 1030, 540, 350]
                            ]);

                            var options = {
                                chart: {
                                    title: 'Pacientes Cadastrados',
                                    subtitle: '',
                                },
                                bars: 'horizontal' // Required for Material Bar Charts.
                            };

                            var chart = new google.charts.Bar(document.getElementById('barchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                    </script>

                    <div id="barchart_material" style="width: 900px; height: 500px;"></div>

                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <h4 align="left">Versão 1.0</h4>
            </div>
        </footer>
    </div>
</div>

<!-- REFERENCIAS EM JS  -->
<script src="{{asset('js/core/jquery.min.js')}}"></script>
<script src="{{asset('js/core/popper.min.js')}}"></script>
<script src="{{asset('js/core/bootstrap-material-design.min.js')}}"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('js/plugins/moment.min.js')}}"></script>
<script src="{{asset('js/plugins/sweetalert2.js')}}"></script>
<script src="{{asset('js/plugins/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/plugins/jquery.bootstrap-wizard.js')}}"></script>
<script src="{{asset('js/plugins/bootstrap-selectpicker.js')}}"></script>
<script src="{{asset('js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('js/plugins/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/plugins/bootstrap-tagsinput.js')}}"></script>
<script src="{{asset('js/plugins/jasny-bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/fullcalendar.min.js')}}"></script>
<script src="{{asset('js/plugins/jquery-jvectormap.js')}}"></script>
<!--<script src="{{asset('assets/js/plugins/nouislider.min.js')}}"></script> -->
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js')}}"></script>
<script src="{{asset('js/plugins/arrive.min.js')}}"></script>


<script src="{{asset('js/mascara.js')}}"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

</body>

</html>
