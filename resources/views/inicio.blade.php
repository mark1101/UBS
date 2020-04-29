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

<body class="" style="background-image: url({{asset('img/inicio.jpg')}}) ; background-size: 100% 100%;">
<div class="wrapper ">

    <div class="sidebar" data-color="green" data-background-color="white" data-image="../assets/img/unidade.jpg">
        <div class="logo"><a href="{{'inicio'}}" class="simple-text logo-normal">
                Unidade {{Auth::user()->localidade}}
            </a></div>
        <div class="sidebar-wrapper ">
            <ul class="nav">
                <li class="nav-item active ">
                    <a class="nav-link" href="{{route('inicio')}}">
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
                        <a class="dropdown-item" href="{{route('paciente')}}">Cadastro de Paciente</a>
                        <a class="dropdown-item" href="{{route('mostraPaciente')}}">Busca de Paciente</a>
                    </div>
                </li>
                @if(Auth::user()->controle_acesso == 2)
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">content_paste</i>
                            Exames
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('cadastroExame')}}">Novo Exame</a>
                            <a class="dropdown-item" href="{{route('buscarExame')}}">Buscar Exames </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">insert_emoticon</i>
                            Consultas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('consultaCadastro')}}">Nova Consulta</a>
                            <a class="dropdown-item" href="{{route('mostraConsulta')}}">Buscar Consulta </a>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('indexVacina')}}">
                            <i class="material-icons">format_color_reset
                            </i>
                            <p>Vacinas</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('encaminhamento')}}">
                            <i class="material-icons">arrow_right_alt
                            </i>
                            <p>Encaminhamentos</p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{route('recado')}}">
                        <i class="material-icons">attach_file
                        </i>
                        <p>Recados</p>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link" href="{{route('historicoPaciente')}}">
                        <i class="material-icons">history
                        </i>
                        <p>Histórico dos Pacientes</p>
                    </a>
                </li>
                @if(Auth::user()->controle_acesso == 4)
                    <li class="nav-item  ">
                        <a class="nav-link" href="{{route('controleViagem')}}">
                            <i class="material-icons">commute
                            </i>
                            <p>Gerenciamento de Viagens</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('agendamentoDentista')}}">
                            <i class="material-icons">airline_seat_flat_angled
                            </i>
                            <p>Agendamento Dentista</p>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a class="nav-link" href="{{route('confirmaViagem')}}">
                            <i class="material-icons">commute
                            </i>
                            <p>Confirmação de Viagens</p>
                        </a>
                    </li>
                @endif
                @if(Auth::user()->funcao == "Medicina")
                    <li class="nav-item  ">
                        <a class="nav-link" href="{{route('atestadoMedico')}}">
                            <i class="material-icons">assignment_late
                            </i>
                            <p>Atestado Medico</p>
                        </a>
                    </li>
                @endif
            </ul>

        </div>
    </div>

    <div class="main-panel">
        <!-- Navbar -->
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
                            <a style="color: white" id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
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
                {{--<h1 align="center" style="font-family: Candara ; font-size: 100px ; color: black">BEM VINDO </h1>--}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header">
                            <div class="form-group">
                                <h3 class="bmd-label-floating">Atividades realizadas hoje</h3>
                                {{--<form id="filters" name="filters" action="{{route('buscaHistorico')}}"
                                      method="POST">
                                    @csrf
                                    <h3 class="bmd-label-floating">Atividades realizadas hoje</h3>
                                    <br>
                                    <input type="hidden" name="filterValues" id="filterValues">

                                    <button data-id="vacinas" data-checked="false" type="button"
                                            class="filter-btn btn btn-teal">
                                        Vacinas
                                    </button>

                                    <button data-id="consultas" data-checked="false" type="button"
                                            class="filter-btn btn btn-teal">
                                        Consultas
                                    </button>

                                    <button data-id="encaminhamentos" data-checked="false" type="button"
                                            class="filter-btn btn btn-teal">
                                        Encaminhamentos
                                    </button>

                                    --}}{{--<button data-id="exames" data-checked="false" type="button"
                                            class="filter-btn btn btn-primary">
                                        Exames
                                    </button>--}}{{--

                                    <button type="submit" class="btn btn-teal btn-round btn-just-icon">
                                        <i class="material-icons">search</i>
                                    </button>
                                </form>--}}

                                <div class="card-body">
                                    <div class="table-responsive" style="overflow: auto">
                                        <table class="table">

                                            <thead class="thead-light">
                                            <tr>
                                                <th>Atividade</th>
                                                <th>Profissional</th>
                                                <th>Paciente</th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            @foreach($consultas as $c)
                                                <tr>
                                                    <td>Consulta</td>
                                                    <td>{{($c->profissional)->name}}</td>
                                                    <td>{{($c->paciente)->nome}} {{($c->paciente)->ultimo_nome}}</td>
                                                </tr>
                                            @endforeach

                                            @foreach($vacinas as $v)
                                                <tr>
                                                    <td>Vacina</td>
                                                    <td>{{($v->profissional)->name}}</td>
                                                    <td>{{($v->paciente)->nome}} {{($v->paciente)->ultimo_nome}}</td>
                                                </tr>
                                            @endforeach

                                            @foreach($encaminhamentos as $e)
                                                <tr>
                                                    <td>Encaminhamento</td>
                                                    <td>{{($e->profissional)->name}}</td>
                                                    <td>{{($e->paciente)->nome}} {{($e->paciente)->ultimo_nome}}</td>
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
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>


        <script>
            $(document).ready(function () {
                var selectedFilters = [];

                $('.filter-btn').on('click', function () {
                    var clickedButton = $(this);

                    var checked = !Boolean(clickedButton.data('checked'));
                    clickedButton.data('checked', checked);

                    var dataId = clickedButton.data('id');

                    clickedButton.toggleClass("btn-info");
                    clickedButton.toggleClass("btn-danger");

                    if (!selectedFilters.includes(dataId) && checked) {
                        selectedFilters.push(dataId);
                    } else {
                        const index = selectedFilters.indexOf(dataId);

                        if (index > -1) {
                            selectedFilters.splice(index, 1);
                        }
                    }

                    var formattedFilters = selectedFilters.join(",");
                    $('#filterValues').val(formattedFilters);
                });
            });

        </script>

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
<script src="{{asset("js/plugins/nouislider.min.js")}}"></script>
<script src="{{asset("https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js")}}"></script>
<script src="{{asset("js/plugins/arrive.min.js")}}"></script>

</body>

</html>
