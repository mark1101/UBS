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

<body class="">
<div class="wrapper ">

    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/unidade.jpg">
        <div class="logo"><a href="{{'inicio'}}" class="simple-text logo-normal">
                {{Auth::user()->funcao}}
            </a></div>
        <div class="sidebar-wrapper ">
            <ul class="nav">
                <li class="nav-item active ">
                    <a class="nav-link" href="">
                        <i class="material-icons">home_work</i>
                        <p>Início</p>
                    </a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        Paciente
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="">Visualizar dados</a>
                        <a class="dropdown-item" href="">Outra funcao</a>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">
                        <i class="material-icons">arrow_right_alt
                        </i>
                        <p>Dados de encaminhamentos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="material-icons">attach_file
                        </i>
                        <p>Recados</p>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link" href="#">
                        <i class="material-icons">history
                        </i>
                        <p>Histórico de Pacientes</p>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link" href="#">
                        <i class="material-icons">commute
                        </i>
                        <p>Dados de viagens</p>
                    </a>
                </li>
            </ul>

        </div>
    </div>

    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">

                <!--<div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:;">Tela Inicial</a>
                </div> -->

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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
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

        <div class="content" )>
            <div class="container-fluid">
                <h1 align="center" style="font-family: Candara">TELA DE ADMINISTRADOR</h1>
                <div class="row d-flex justify-content-center" > <!-- CLASSE DE ALINHAMENTO -->
                    <div align="center" class="card" style="width: 14rem;">
                        <div class="card-body">
                            <h5 class="card-title">Profissionais</h5>
                            <p class="card-text">Visualizar dados </p>
                            <a href="#" class="btn btn-primary">Ver</a>
                        </div>
                    </div>
                    &nbsp &nbsp &nbsp
                    <div align="center" class="card" style="width: 14rem;">
                        <div class="card-body">
                            <h5 class="card-title">Título do card</h5>
                            <p class="card-text">Visualizar dados </p>
                            <a href="#" class="btn btn-primary">Visitar</a>
                        </div>
                    </div>
                    &nbsp &nbsp &nbsp
                    <div align="center" class="card" style="width: 14rem;">
                        <div class="card-body">
                            <h5 class="card-title">Título do card</h5>
                            <p class="card-text">Visualizar dados </p>
                            <a href="#" class="btn btn-primary">Visitar</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <footer class="footer">
            <div class="container-fluid">
            </div>
        </footer>
    </div>
</div>

<!-- REFERENCIAS EM JS  -->
<script src="{{asset("js/core/jquery.min.js")}}"></script>
<script src="{{asset("js/core/popper.min.js")}}"></script>
<script src="{{asset("js/core/bootstrap-material-design.min.js")}}"></script>
<script src="{{asset("js/plugins/perfect-scrollbar.jquery.min.js")}}"></script>
<script src="{{asset("js/plugins/moment.min.js")}}"></script>
<script src="{{asset("js/plugins/sweetalert2.js")}}"></script>
<script src="{{asset("js/plugins/jquery.validate.min.js")}}"></script>
<script src="{{asset("js/plugins/jquery.bootstrap-wizard.js")}}"></script>
<script src="{{asset("js/plugins/bootstrap-selectpicker.js")}}"></script>
<script src="{{asset("js/plugins/bootstrap-datetimepicker.min.js")}}"></script>
<script src="{{asset("js/plugins/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("js/plugins/bootstrap-tagsinput.js")}}"></script>
<script src="{{asset("js/plugins/jasny-bootstrap.min.js")}}"></script>
<script src="{{asset("js/plugins/fullcalendar.min.js")}}"></script>
<script src="{{asset("js/plugins/jquery-jvectormap.js")}}"></script>
<script src="{{asset("assets/js/plugins/nouislider.min.js")}}"></script>
<script src="{{asset("https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js")}}"></script>
<script src="{{asset("js/plugins/arrive.min.js")}}"></script>

</body>

</html>
