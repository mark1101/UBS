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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Funcao', 'Quantidade'],
                <?php
                foreach ($consultas as $key => $value) {
                    echo "['" . $key . "', " . $value . "],";
                }
                ?>
            ]);

            var options = {
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Funcao', 'Quantidade'],
                <?php
                foreach ($tratamentos as $key => $value) {
                    echo "['" . $key . "', " . $value . "],";
                }
                ?>
            ]);

            var options = {
                is3D: true,
            };

            var chart1 = new google.visualization.PieChart(document.getElementById('piechart_3d1'));
            chart1.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Funcao', 'Quantidade'],
                <?php
                foreach ($encaminhamentos as $key => $value) {
                    echo "['" . $key . "', " . $value . "],";
                }
                ?>
            ]);

            var options = {
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3denxaminha'));
            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Funcao', 'Quantidade'],
                <?php
                foreach ($proC as $p) {
                    echo "['" . $p["data"]->name . "', " . $p['count'] . "],";
                }
                ?>
            ]);

            var options = {
                is3D: true,
            };

            var chart2 = new google.visualization.PieChart(document.getElementById('piechart_3d2'));
            chart2.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Funcao', 'Quantidade'],
                <?php
                foreach ($proT as $p) {
                    echo "['" . $p["data"]->name . "', " . $p['count'] . "],";
                }
                ?>
            ]);

            var options = {
                is3D: true,
            };

            var chart3 = new google.visualization.PieChart(document.getElementById('piechart_3d3'));
            chart3.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Funcao', 'Quantidade'],
                <?php
                foreach ($proE as $p) {
                    echo "['" . $p["data"]->name . "', " . $p['count'] . "],";
                }
                ?>
            ]);

            var options = {
                is3D: true,
            };

            var chart3 = new google.visualization.PieChart(document.getElementById('relacaoEncaminhamentos'));
            chart3.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {packages: ["corechart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Funcao', 'Quantidade'],
                ['De 0 a 10',     <?php echo $faixa1 ?>],
                ['De 11 a 30 anos',     <?php echo $faixa2 ?>],
                ['Maiores que 30',     <?php echo $faixa3 ?>],
            ]);

            var options = {
                is3D: true,
            };

            var chart4 = new google.visualization.PieChart(document.getElementById('piechart_3d4'));
            chart4.draw(data, options);
        }
    </script>

</head>

<body class="" style="background-color: white">
<div class="wrapper ">

    <div class="sidebar" data-color="admin" data-background-color="white" data-image="../assets/img/unidade.jpg">
    <div class="logo"><a href="{{'/'}}" class="simple-text logo-normal">
                <h4 style="color: black">Dados Estatísticos</h4>
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
                    <a class="nav-link" href="{{route('veProfissionais')}}">
                        <i class="material-icons">person
                        </i>
                        <p>Profissionais</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('veEncaminhamento')}}">
                        <i class="material-icons">arrow_right_alt
                        </i>
                        <p>Encaminhamentos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('veOdontologico')}}">
                        <i class="material-icons">airline_seat_flat_angled

                        </i>
                        <p>Odontológico</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('veConsultas')}}">
                        <i class="material-icons">insert_emoticon
                        </i>
                        <p>Consultas</p>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link" href="{{route('veViagens')}}">
                        <i class="material-icons">commute
                        </i>
                        <p>Viagens</p>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link" href="#">
                        <i class="material-icons">content_paste
                        </i>
                        <p>Exames</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">
                        <i class="material-icons">format_color_reset
                        </i>
                        <p>Vacinas</p>
                    </a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">history</i>
                        Dados Gráficos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('graficos')}}">Comum</a>
                        <a class="dropdown-item" href="#">Odontologia</a>
                    </div>
                </li>
            </ul>

        </div>
    </div>

    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">

                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:;"></a>
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
                            <a style="color: black" id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                               role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
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
                <div class="container">
                    <button type="button" class="btn btn-primary-admin" data-target="#modalPacientes"
                            data-toggle="modal">faixa etaria de pacientes
                    </button>
                    <button type="button" class="btn btn-primary-admin" data-target="#modalDentistas"
                            data-toggle="modal">Dentistas / Consulta
                    </button>
                    <button type="button" class="btn btn-primary-admin" data-target="#modalDentistasT"
                            data-toggle="modal">Dentistas / Tratamentos
                    </button>
                    <button type="button" class="btn btn-primary-admin" data-target="#modalDentistasE"
                            data-toggle="modal">Dentistas / Encaminhamentos
                    </button>
                </div>
                <div class="card" style="align-items: flex-start">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">relação cosultas odontológicas / localidade </h6>
                        <div id="piechart_3d" style="width: 450px; height: 300px;"></div>
                    </div>
                </div>
                <div class="card" style="align-items: flex-start">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">relação tratamentos odontológicos / localidade </h6>
                        <div id="piechart_3d1" style="width: 450px; height: 300px;"></div>
                    </div>
                </div>
                <div class="card" style="align-items: flex-start">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">relação encaminhamentos odontológicos / localidade </h6>
                        <div id="piechart_3denxaminha" style="width: 450px; height: 300px;"></div>
                    </div>
                </div>
                <br>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="modalDentistas" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Quantidade de Consultas realizadas por
                            Dentista</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="card-body">
                            <div id="piechart_3d2" style="width: 600px; height: 300px;"></div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary-admin" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="modalDentistasT" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Quantidade de Tratamento Realizado por
                            Dentista</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="card-body">
                            <div id="piechart_3d3" style="width: 450px; height: 300px;"></div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary-admin" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="modalDentistasE" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Quantidade de Encaminhamentos realizados por
                            Dentista</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="card-body">
                            <div id="relacaoEncaminhamentos" style="width: 600px; height: 300px;"></div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary-admin" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="modalPacientes" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Faixa etária dos pacientes atendidos nas UBS do Município</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div id="piechart_3d4" style="width: max-content; height: 300px;"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary-admin" data-dismiss="modal">Fechar</button>
                    </div>
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
