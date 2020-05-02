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

<body class="">
<div class="wrapper ">

    <div class="sidebar" data-color="green" data-background-color="white" data-image="../assets/img/unidade.jpg">
        <div class="logo"><a href="{{'inicio'}}" class="simple-text logo-normal">
                Unidade {{Auth::user()->localidade}}
            </a></div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item  ">
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
                <li class="nav-item active">
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
                <li class="nav-item ">
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
                    <li class="nav-item ">
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

                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:;">Gerenciamento de Vacinas</a>
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
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

        <!-- CADASTRO DE EXAME COMPLETO  -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- FORM DE CADASTRO DE VACINA  -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Cadastro de Vacina</h4>
                            </div>
                            <div class="card-body">
                                <form id="cadastraVacina" {{--action="{{route('cadastraVacina')}}" method="post"--}}>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Nome Paciente</label>
                                                <select
                                                        class="form-control ls-select" name="id_paciente"
                                                        id="id_paciente">
                                                    @foreach($pacientes as $paciente)
                                                        <option
                                                            value="{{$paciente->id}}">
                                                            {{$paciente->nome}} {{$paciente->ultimo_nome}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Vacina Realizada</label>
                                                <input type="text" class="form-control" id="vacina_realizada"
                                                       name="vacina_realizada" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Informação de Lote</label>
                                                <input type="text"
                                                       class="form-control" id="informacao_lote"
                                                       name="informacao_lote" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Dose</label>
                                                <input style="text-transform: uppercase;" type="number"
                                                       class="form-control" id="dose" name="dose" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary-normal">Salvar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="overflow: hidden">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Buscar da vacina pode ser feita pelo nome do paciente</h4>
                                <form id="buscaVacina" class="navbar-form">
                                    @csrf
                                    <div class="input-group no-border">
                                        <input onkeyup="submitForm()" type="text" id="criterio" name="criterio"
                                               style="color:beige;" value="" class="form-control">
                                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                            <i class="material-icons">search</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="card-body">
                                <div class="card-body">
                                    <div class="table-responsive" style="overflow: auto; height: 300px;">
                                        <table id="tableSearch" class="table">
                                            <thead>

                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function submitForm() {
                                    if ($("#criterio").val() === "") {
                                        $("#tableSearch").html("");
                                    } else {
                                        $("#buscaVacina").submit();
                                    }
                                }
                            </script>


                            <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
                            <script
                                src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

                            <script>

                                $(function () {
                                    $('form[id="buscaVacina"]').submit(function (event) {
                                        event.preventDefault();
                                        $.ajax({
                                            url: "{{route('searchVacina')}}",
                                            type: "get",
                                            data: $(this).serialize(),
                                            dataType: 'json',
                                            success: function (response) {
                                                if (response.success === true) {
                                                    var newRow = $("<tr>");
                                                    var cols = "";
                                                    cols += '<th>Posto de Vacinação</th>';
                                                    cols += '<th>Nome Paciente</th>';
                                                    cols += '<th>Vacina Realizada</th>';
                                                    cols += '<th>Info de Lote</th>';
                                                    cols += '<th>Data</th>';
                                                    cols += '<th>Dose</th>';
                                                    newRow.append(cols);

                                                    $("#tableSearch").html("").append(newRow).fadeIn();

                                                    $.each(response.data, function (item, value) {

                                                        let data = response.data[item]["data"];
                                                        let split = data.split(' '); //separa a data da hora
                                                        let formmated = split[0].split('-');

                                                        var newRow = $("<tr>");
                                                        var cols = "";
                                                        cols += '<td>' + response.data[item]['localidade']['nome'] + '</td>';
                                                        cols += '<td>' + response.data[item]["paciente"].nome + " " + response.data[item]["paciente"].ultimo_nome + '</td>';
                                                        cols += '<td>' + response.data[item]["vacina_realizada"] + '</td>';
                                                        cols += '<td>' + response.data[item]["informacao_lote"] + '</td>';
                                                        cols += '<td>' + formmated[2] + '/' + formmated[1] + '/' + formmated[0] + '</td>';
                                                        cols += '<td>' + response.data[item]['dose'] + '</td>';
/*
                                                        cols += '<td><a  data-toggle="modal" data-target="#modal' + response.data[item]['id'] + '" style="width: 55px;"> <i class="material-icons" style="color: black;"title="Salvar Paciente">print</i></a>\n</td>';
*/

                                                        newRow.append(cols);
                                                        $("#tableSearch").append(newRow).fadeIn();
                                                    });
                                                } else {
                                                    //erro
                                                }
                                            }
                                        });
                                    });
                                });


                                $(function () {
                                    $('form[id="cadastraVacina"]').submit(function (event) {
                                        event.preventDefault();

                                        $.ajax({
                                            url: "{{route('cadastraVacina')}}",
                                            type: "POST",
                                            data: $(this).serialize(),
                                            dataType: 'json',
                                            success: function (response) {
                                                if (response.success === true) {

                                                    $('#vacina_realizada').val("");
                                                    $('#informacao_lote').val("");
                                                    $('#dose').val("");

                                                    alert('Vacina Cadastrada com Sucesso!');

                                                    $("#buscaVacina").submit();


                                                } else {

                                                    alert('Erro ao cadastrar!');

                                                }
                                            }
                                        })
                                    })
                                })

                            </script>

                            <script>
                                $(document).ready(function () {
                                    $("#buscaVacina").submit();
                                })
                            </script>


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
<script src="{{asset('js/plugins/nouislider.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js')}}"></script>
<script src="{{asset('js/plugins/arrive.min.js')}}"></script>


</body>

</html>
