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
                <li class="nav-item  ">
                    <a class="nav-link" href="{{route('controleViagem')}}">
                        <i class="material-icons">commute
                        </i>
                        <p>Agendamento de veículos</p>
                    </a>
                </li>
                @if(Auth::user()->controle_acesso == 4)
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('agendamentoDentista')}}">
                            <i class="material-icons">airline_seat_flat_angled
                            </i>
                            <p>Agendamento Dentista</p>
                        </a>
                    </li>
                    <li class="nav-item  active">
                        <a class="nav-link" href="{{route('confirmaViagem')}}">
                            <i class="material-icons">commute
                            </i>
                            <p>Confirmação de Viagens</p>
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
                    <a class="navbar-brand" href="javascript:;">Viagens ainda não confirmadas</a>
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


        <div class="content">
            <div class="container-fluid">

                <div class="col-md-12" style="overflow: hidden">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Busca pode ser feita por destino</h4>
                            <form id="buscaViagem" class="navbar-form">
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
                            <div class="table-responsive" style="overflow: auto; height: 300px;">
                                <table id="tableSearch" class="table">
                                    <thead>

                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                            {{--<div class="card-body">
                                <div class="card-body">
                                    <div class="table-responsive" style="overflow: auto; height: 300px;">
                                        <table id="tableSearch" class="table">
                                            <thead>

                                            <tr>
                                                <th>Origem</th>
                                                <th>Destino</th>
                                                <th>Motorista</th>
                                                <th>Num Passageiros</th>
                                                <th>Data</th>
                                                <th>Ativo</th>
                                                <th></th>

                                            </tr>

                                            </thead>
                                            <tbody>

                                            @foreach($viagens as $v)
                                                <tr>
                                                    <td>{{($v->localidadeOrigem)->nome}}</td>
                                                    <td>{{$v->destino}}</td>
                                                    <td>{{($v->motorista)->nome}}</td>
                                                    <td>{{$v->num_pacientes}}</td>
                                                    <td>{{$v->data}}</td>
                                                    <td>{{$v->ativo}}</td>
                                                    <td><a href="{{route('confirmaaa',['id' => $v->id])}}">Confirmar</a></td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>--}}

                            <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
                            <script
                                src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

                            @foreach($viagens as $viagem)
                                <div class="modal fade" id="modal{{$viagem->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edição de viagens</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div id="editFicha" class="modal-body">
                                                <div class=" container">
                                                    <form id="form{{$viagem->id}}">
                                                        @csrf
                                                        Destino: <label for="name{{$viagem->id}}"></label>
                                                        <input id="destino" name="destino" class="form-control"
                                                               value="{{$viagem->destino}}" required>
                                                        <br>
                                                        Observação: <label for="name{{$viagem->id}}"></label>
                                                        <input id="observacao" name="observacao" class="form-control"
                                                               value="{{$viagem->observacao}}" required>
                                                        <br>
                                                        Num Pacientes: <label
                                                            for="num_pacientes{{$viagem->id}}"></label>
                                                        <input value="{{$viagem->num_pacientes}}" class="form-control"
                                                               name="num_pacientes" id="num_pacientes" required>
                                                        <br>
                                                        Data: <label for="data{{$viagem->id}}"></label>
                                                        <input value="{{$viagem->data}}" class="form-control data"
                                                               name="data" id="data" required>
                                                        <br>
                                                        <div class="row" style="float: right; left: 30%">
                                                            <button type="submit" class="btn btn-success">Salvar
                                                                mudanças
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <script>
                                                    $(function () {
                                                        $('form[id="form{{$viagem->id}}"]').submit(function (event) {
                                                            event.preventDefault();
                                                            $.ajax({
                                                                url: "{{route('alteraViagem',['id'=>$viagem->id])}}",
                                                                type: "post",
                                                                data: $(this).serialize(),
                                                                dataType: 'json',
                                                                success: function (response) {
                                                                    if (response.success === true) {
                                                                        $("#footer{{$viagem->id}}").fadeIn();
                                                                        $("#message{{$viagem->id}}").text(response.message);
                                                                        $.wait(function () {
                                                                            $("#footer{{$viagem->id}}").fadeOut();
                                                                        }, 5);
                                                                        $("#buscaViagem").submit();
                                                                    }
                                                                }
                                                            });
                                                        });
                                                        $.wait = function (callback, seconds) {
                                                            return window.setTimeout(callback, seconds * 1000);
                                                        }
                                                    });
                                                </script>
                                            </div>
                                            <div class="modal-footer" id="footer{{$viagem->id}}" style="display: none">
                                                <span id="message{{$viagem->id}}" style="color: green"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @foreach($viagens as $viagem)
                                <div class="modal fade" id="modalConfirma{{$viagem->id}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div id="editFicha" class="modal-body">
                                                <div class=" container">
                                                    <form id="confirma{{$viagem->id}}">
                                                        @csrf
                                                        <h3>Confirmar viagem com destino a {{$viagem->destino}}
                                                            dia {{$viagem->data}} ?</h3>
                                                        <div class="row" style="float: right; left: 30%">
                                                            <button type="submit" class="btn btn-success">Salvar
                                                                mudanças
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <script>
                                                    $(function () {
                                                        $('form[id="confirma{{$viagem->id}}"]').submit(function (event) {
                                                            event.preventDefault();
                                                            $.ajax({
                                                                url: "{{route('confirmacaoviagem',['id'=>$viagem->id])}}",
                                                                type: "post",
                                                                data: $(this).serialize(),
                                                                dataType: 'json',
                                                                success: function (response) {
                                                                    if (response.success === true) {
                                                                        $("#footer{{$viagem->id}}").fadeIn();
                                                                        $("#message{{$viagem->id}}").text(response.message);
                                                                        $.wait(function () {
                                                                            $("#footer{{$viagem->id}}").fadeOut();
                                                                        }, 5);
                                                                        $("#buscaViagem").submit();
                                                                        $("#modalConfirma").modal('hide');
                                                                    }
                                                                }
                                                            });
                                                        });
                                                        $.wait = function (callback, seconds) {
                                                            return window.setTimeout(callback, seconds * 1000);
                                                        }
                                                    });
                                                </script>
                                            </div>
                                            <div class="modal-footer" id="footer{{$viagem->id}}" style="display: none">
                                                <span id="message{{$viagem->id}}" style="color: green"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            <script>
                                $(function () {
                                    $('form[id="buscaViagem"]').submit(function (event) {
                                        event.preventDefault();
                                        $.ajax({
                                            url: "{{route('buscaViagemNao')}}",
                                            type: "get",
                                            data: $(this).serialize(),
                                            dataType: 'json',
                                            success: function (response) {
                                                if (response.success === true) {
                                                    var newRow = $("<tr>");
                                                    var cols = "";
                                                    /*cols += '<th>Origem</th>';*/
                                                    cols += '<th>Destino</th>';
                                                    cols += '<th>Motorista</th>';
                                                    cols += '<th>Num Passageiros</th>';
                                                    cols += '<th>Observação</th>';
                                                    cols += '<th>Data</th>';
                                                    cols += '<th></th>';
                                                    cols += '<th></th>';
                                                    newRow.append(cols);

                                                    $("#tableSearch").html("").append(newRow).fadeIn();
                                                    //funcionou
                                                    $.each(response.data, function (item, value) {
                                                        var newRow = $("<tr>");
                                                        var cols = "";
                                                        /*cols += '<td>' + response.data[item]["localidadeOrigem"]["nome"] + '</td>';*/
                                                        cols += '<td>' + response.data[item]["destino"] + '</td>';
                                                        cols += '<td>' + response.data[item]["motorista"]["nome"] + '</td>';
                                                        cols += '<td>' + response.data[item]['num_pacientes'] + '</td>';
                                                        cols += '<td>' + response.data[item]['observacao'] + '</td>';
                                                        cols += '<td>' + response.data[item]['data'] + '</td>';
                                                        cols += '<td><a   href="#" data-toggle="modal" data-target="#modal' + response.data[item]['id'] + '" style="width: 55px;"> <i class="material-icons" style="color: black;"title="Salvar Paciente">brush</i></a>\n</td>';
                                                        cols += '<td><a   href="#" data-toggle="modal" data-target="#modalConfirma' + response.data[item]['id'] + '" style="width: 55px;"> <i class="material-icons" style="color: black;"title="Salvar Paciente">done</i></a>\n</td>';

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

                            </script>

                            <script>
                                function submitForm() {
                                    if ($("#criterio").val() === "") {
                                        $("#tableSearch").html("");
                                    } else {
                                        $("#buscaViagem").submit();
                                    }
                                }
                            </script>

                            <script>
                                $(document).ready(function () {
                                    $("#buscaViagem").submit();
                                })
                            </script>


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
    {{--<script src="{{asset('assets/js/plugins/nouislider.min.js')}}"></script>--}}
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js')}}"></script>
    <script src="{{asset('js/plugins/arrive.min.js')}}"></script>

    <script src="{{asset('js/mascara.js')}}"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>


</body>

</html>
