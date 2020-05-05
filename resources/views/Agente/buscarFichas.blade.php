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

    <div class="sidebar" data-color="orange" data-background-color="white" data-image="../assets/img/unidade.jpg">
        <div class="logo"><a href="#" class="simple-text logo-normal">
                <img src="{{asset('img/agente.png')}}">
            </a></div>
        <div class="sidebar-wrapper ">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('admAgente')}}">
                        <i class="material-icons">home_work</i>
                        <p>Início</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('AgenteBuscaPaciente')}}">
                        <i class="material-icons">person</i>
                        Busca Paciente
                    </a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link" href="{{route('recadoAgente')}}">
                        <i class="material-icons">chat
                        </i>
                        <p>Recados</p>
                    </a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">assignment</i>
                        Ficha de visita
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('cadastroFicha')}}">Nova visita</a>
                        <a class="dropdown-item" href="{{route('buscaVisita')}}">Buscar ficha</a>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">
                        <i class="material-icons">history
                        </i>
                        <p>Histórico de Pacientes</p>
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
                            <div class="card-header card-header-warning">
                                <h4 class="card-title">A busca é feita por integrante identificador da familía</h4>
                                <form id="buscaFicha" class="navbar-form">
                                    @csrf
                                    <div class="input-group no-border">
                                        <input onkeyup="submitForm()" type="text" style="color:beige;" id="criterio"
                                               name="criterio"
                                               class="form-control">
                                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                            <i class="material-icons">search</i>
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
                        </div>
                    </div>

                    <script>
                        function submitForm() {
                            if ($("#criterio").val() === "") {
                                $("#tableSearch").html("");
                            } else {
                                $("#buscaFicha").submit();
                            }
                        }
                    </script>

                    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

                    @foreach($fichas as $ficha)
                        <div class="modal fade" id="modal{{$ficha->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edição ficha de visitas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div id="editFicha" class="modal-body">
                                        <div class=" container">
                                            <form id="form{{$ficha->id}}">
                                                @csrf
                                                Nome identificador: <label for="name{{$ficha->id}}"></label>
                                                <input id="identificador" name="identificador" class="form-control"
                                                       value="{{$ficha->identificador}}" required>
                                                <br>
                                                Descricao da visita: <label for="descricao{{$ficha->id}}"></label>
                                                <textarea  class="form-control" name="descricao" id="descricao" rows="3" required>{{$ficha->descricao}}
                                                </textarea>
                                                <br>
                                                Problemas: <label for="problemas{{$ficha->id}}"></label>
                                                <textarea  class="form-control" name="problemas" id="problemas" rows="3" required>{{$ficha->problemas}}
                                                </textarea>
                                                <br>
                                                <div class="row" style="float: right; left: 30%">
                                                    <button type="submit" class="btn btn-success">Salvar mudanças
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <script>
                                            $(function () {
                                                $('form[id="form{{$ficha->id}}"]').submit(function (event) {
                                                    event.preventDefault();
                                                    $.ajax({
                                                        url: "{{route('alteraficha',['id'=>$ficha->id])}}",
                                                        type: "post",
                                                        data: $(this).serialize(),
                                                        dataType: 'json',
                                                        success: function (response) {
                                                            if (response.success === true) {
                                                                $("#footer{{$ficha->id}}").fadeIn();
                                                                $("#message{{$ficha->id}}").text(response.message);
                                                                $.wait(function () {
                                                                    $("#footer{{$ficha->id}}").fadeOut();
                                                                }, 5);
                                                                $("#buscaFicha").submit();
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
                                    <div class="modal-footer" id="footer{{$ficha->id}}" style="display: none">
                                        <span id="message{{$ficha->id}}" style="color: green"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <script>
                        $(function () {
                            $('form[id="buscaFicha"]').submit(function (event) {
                                event.preventDefault();
                                $.ajax({
                                    url: "{{route('buscaFichaVisita')}}",
                                    type: "get",
                                    data: $(this).serialize(),
                                    dataType: 'json',
                                    success: function (response) {
                                        if (response.success === true) {
                                            var newRow = $("<tr>");
                                            var cols = "";
                                            cols += '<th>Nome Identificador</th>';
                                            cols += '<th>Descricao da Visita</th>';
                                            cols += '<th>Problemas</th>';
                                            cols += '<th>Localidade</th>';
                                            cols += '<th>Data</th>';
                                            newRow.append(cols);

                                            $("#tableSearch").html("").append(newRow).fadeIn();
                                            //funcionou
                                            $.each(response.data, function (item, value) {
                                                var newRow = $("<tr>");
                                                var cols = "";
                                                cols += '<td>' + response.data[item]["identificador"] + '</td>';
                                                cols += '<td>' + response.data[item]["descricao"] + '</td>';
                                                cols += '<td>' + response.data[item]["problemas"] + '</td>';
                                                cols += '<td>' + response.data[item]['localidade']['nome'] + '</td>';
                                                cols += '<td>' + response.data[item]['data'] + '</td>';
                                                cols += '<td><a   href="#" data-toggle="modal" data-target="#modal' + response.data[item]['id'] + '" style="width: 55px;"> <i class="material-icons" style="color: black;"title="Salvar Paciente">edit</i></a>\n</td>';

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
                        $(document).ready(function () {
                            $("#buscaFicha").submit();
                        })
                    </script>


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
