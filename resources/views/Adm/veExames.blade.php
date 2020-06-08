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

<body class="" style="background-color: #f2f2f2">
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
                <li class="nav-item active">
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
                    <a class="nav-link" href="{{route('veExames')}}">
                        <i class="material-icons">content_paste
                        </i>
                        <p>Exames</p>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link" href="{{route('veVacinas')}}">
                        <i class="material-icons">format_color_reset
                        </i>
                        <p>Vacinas</p>
                    </a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">history</i>
                        Dados Gráficos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('graficos')}}">Comum</a>
                        <a class="dropdown-item" href="{{route('graficoOdonto')}}">Odontologia</a>
                    </div>
                </li>
            </ul>

        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">


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
                <div class="row d-flex justify-content-center"> <!-- CLASSE DE ALINHAMENTO -->
                    <div align="center" class="card" style="width: 13rem; height: 13rem;">
                        <div class="card-body">
                            <h5 class="card-title">Total de Exames</h5>
                            <br>
                            <h1>{{$exames}}</h1>
                        </div>
                    </div>
                    &nbsp &nbsp &nbsp
                    <div align="center" class="card" style="width: 13rem; height: 13rem;">
                        <div class="card-body">
                            <h5 class="card-title">Profissionais</h5>
                            <br>
                            <h1>{{$profissionaisTotal}}</h1>
                            <button type="button" class="btn btn-primary-admin" data-toggle="modal"
                                    data-target="#modalProfissionalConsulta">
                                Ver Detalhes
                            </button>
                        </div>
                    </div>
                    &nbsp &nbsp &nbsp
                    <div align="center" class="card" style="width: 13rem; height: 13rem;">
                        <div class="card-body">
                            <h5>Localidade/Exame</h5>
                            <br><br><br>
                            <button type="button" class="btn btn-primary-admin" data-toggle="modal"
                                    data-target="#modalLocalidade">
                                Ver Detalhes
                            </button>
                        </div>
                    </div>
                </div>

                <br><br><br>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-admin">
                            <h2>Exames cadastrados hoje</h2>
                            <?php
                            date_default_timezone_set('America/Bahia');
                            echo 'Ultima atualização hoje ', date('\à\s H:i');
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="table-responsive" style="overflow: auto; height: 450px;">
                                    <table id="tableSearch" class="table">
                                        <thead>

                                        <tr>
                                            <th><strong>Localidade</strong></th>
                                            <th><strong>Paciente</strong></th>
                                            <th><strong>Profissional</strong></th>
                                        </tr>

                                        </thead>
                                        <tbody>

                                        @foreach($examesDia as $c)
                                            <tr>
                                                <td>{{($c->localidade)->nome}}</td>
                                                <td>{{($c->paciente)->nome}} {{($c->paciente)->ultimo_nome}}</td>
                                                <td>{{($c->profissional)->name}}</td>
                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade bd-example-modal-lg" id="modalProfissionalConsulta" tabindex="-1" role="dialog"
                 aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Profissionais Capacitados a Realizar
                                Consulta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="card-body">
                                <div class="table-responsive" style="overflow: auto; height: 300px;">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th><strong>Nome</strong></th>
                                            <th><strong>Cpf</strong></th>
                                            <th><strong>Módulo de Trabalho</strong></th>
                                            <th><strong>Comunidade de Trabalho</strong></th>
                                            <th><strong>Consultas Realizadas</strong></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($pro as $p)
                                            <tr>
                                                <td>{{$p['data']->name}}</td>
                                                <td>{{$p['data']->cpf}}</td>
                                                <td>{{$p['data']->funcao}}</td>
                                                <td>{{$p['localidade']->nome}}</td>

                                                <td align="center">{{$p['count']}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary-admin" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade bd-example-modal-lg" id="modalLocalidade" tabindex="-1" role="dialog"
                 aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Exames cadastrados</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="card-body">
                                <div class="table-responsive" style="overflow: auto; height: 300px;">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th style="color: black"><strong>Localidade</strong></th>
                                            <th style="color: black"><strong>Quantidade de Consultas</strong></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($localidade as $key => $value)
                                            <tr>
                                                <td>{{$key}}</td>
                                                <td>{{$value}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary-admin" data-dismiss="modal">Fechar</button>
                        </div>
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
