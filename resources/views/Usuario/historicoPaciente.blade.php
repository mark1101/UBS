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
                    @if(Auth::user()->funcao == "Medicina")
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('encaminhamento')}}">
                                <i class="material-icons">arrow_right_alt
                                </i>
                                <p>Encaminhamentos</p>
                            </a>
                        </li>
                    @endif
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{route('recado')}}">
                        <i class="material-icons">attach_file
                        </i>
                        <p>Recados</p>
                    </a>
                </li>
                <li class="nav-item  active">
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
                            <p>Agendamento de veículos</p>
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
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:;"></a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">

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


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header">
                                <div class="form-group">
                                    <form id="filters" name="filters" action="{{route('buscaHistorico')}}"
                                          method="POST">
                                        @csrf
                                        <label class="bmd-label-floating">1 - Localidade</label>
                                        <select class="form-control ls-select"
                                                name="localidade"
                                                id="localidade">
                                            @foreach($localidades as $localidade)
                                                <option
                                                    value="{{$localidade->id}}" >
                                                    {{$localidade->nome}}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <label class="bmd-label-floating">2 - Nome Paciente</label>
                                        <select class="form-control ls-select"
                                                name="id_paciente"
                                                id="id_paciente">
                                            <option
                                                value="">Escolha um Paciente
                                            </option>
                                        </select>
                                        <br>
                                        <label class="bmd-label-floating">3 - Escolha somente uma opção de busca</label>
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

                                        {{--<button data-id="exames" data-checked="false" type="button"
                                                class="filter-btn btn btn-primary">
                                            Exames
                                        </button>--}}

                                        <button type="submit" class="btn btn-teal btn-round btn-just-icon">
                                            <i class="material-icons">search</i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                @if($oque != "" && $oque != "Erro ao pesquisar")
                                    <h3>Historico de {{$oque}} ({{$quantidade}} resultados encontrados)</h3>
                                    <br>
                                @endif
                                @if($oque == "Erro ao pesquisar")
                                    <h3>{{$oque}}</h3>
                                    <br>
                                @endif
                                @if($oque == "consulta")
                                    @foreach($dados as $consulta)
                                        <div class="table-responsive" style="overflow: auto">
                                            <table class="table">

                                                <thead class="thead-light">
                                                <tr>
                                                    <th>Localidade</th>
                                                    <th>Sintomas</th>
                                                    <th>Observacoes</th>
                                                    <th>Finalização</th>
                                                    <th>Data</th>
                                                </tr>
                                                </thead>

                                                <tbody>

                                                <tr>
                                                    <td>{{($consulta->localidade)->nome}}</td>
                                                    <td>{{$consulta->sintomas}}</td>
                                                    <td>{{$consulta->observacoes}}</td>
                                                    <td>{{$consulta->finalizacao}}</td>
                                                    <td>{{date('d/m/Y',strtotime($consulta->data))}}</td>
                                                </tr>


                                            </table>
                                        </div>
                                    @endforeach
                                @endif

                                @if($oque == "encaminhamentos")
                                    @foreach($dados as $encaminhamento)
                                        <div class="table-responsive" style="overflow: auto">
                                            <table class="table">

                                                <thead class="thead-light">
                                                <tr>
                                                    <th>Localidade</th>
                                                    <th>Especialidade</th>
                                                    <th>Observacoes</th>
                                                    <th>Objetivo</th>
                                                    <th>Data</th>
                                                </tr>
                                                </thead>

                                                <tbody>

                                                <tr>
                                                    <td>{{($encaminhamento->localidade)->nome}}</td>
                                                    <td>{{$encaminhamento->especialidade_encaminhamento}}</td>
                                                    <td>{{$encaminhamento->observacao}}</td>
                                                    <td>{{$encaminhamento->objetivo}}</td>
                                                    <td>{{date('d/m/Y',strtotime($encaminhamento->data))}}</td>
                                                </tr>


                                            </table>
                                        </div>
                                    @endforeach
                                @endif

                                @if($oque == "vacinas")
                                    @foreach($dados as $vacinas)
                                        <div class="table-responsive" style="overflow: auto">
                                            <table class="table">

                                                <thead class="thead-light">
                                                <tr>
                                                    <th>Localidade</th>
                                                    <th>Vacina realizada</th>
                                                    <th>Informação de lote</th>
                                                    <th>Data</th>
                                                </tr>
                                                </thead>

                                                <tbody>

                                                <tr>
                                                    <td>{{($vacinas->localidade)->nome}}</td>
                                                    <td>{{$vacinas->vacina_realizada}}</td>
                                                    <td>{{$vacinas->informacao_lote}}</td>
                                                    <td>{{date('d/m/Y',strtotime($vacinas->data))}}</td>
                                                </tr>


                                            </table>
                                        </div>
                                    @endforeach
                                @endif

                                @if($oque == "Erro ao pesquisar")

                                @endif

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

                $('select[name="localidade"]').on('change', function () {

                    var estado_id = $(this).val();
                    console.log(estado_id);

                    $.ajax({
                        url: "{{route('buscaHPaciente',['id' => '_valor_'])}}".replace('_valor_', estado_id),
                        type: 'get',
                        dataType: 'json',
                        success: function (response) {
                            console.log(response);
                            if (response.success === true) {

                                $('select[name=id_paciente]').empty();
                                $.each(response.data, function (item, value) {
                                    $('select[name=id_paciente]').append('<option value="' + response.data[item]["id"] + '">' + response.data[item]["nome"] + ' ' + response.data[item]["ultimo_nome"] +'</option>');
                                });

                            } else {
                                console.log('n deu ');
                            }
                        }
                    })

                });
            });


        </script>

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

        <script>
            $(document).ready(function () {
                $("#localidade").change();
            })
        </script>

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
