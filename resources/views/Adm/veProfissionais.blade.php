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
        google.charts.load('current', {'packages': ['table']});
        google.charts.setOnLoadCallback(drawTable);

        function drawTable() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Name');
            data.addColumn('number', 'Salary');
            data.addColumn('boolean', 'Full Time Employee');
            data.addRows([
                ['Mike', {v: 10000, f: '$10,000'}, true],
                ['Jim', {v: 8000, f: '$8,000'}, false],
                ['Alice', {v: 12500, f: '$12,500'}, true],
                ['Bob', {v: 7000, f: '$7,000'}, true]
            ]);

            var table = new google.visualization.Table(document.getElementById('table_div'));

            table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
        }
    </script>


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
                <li class="nav-item active">
                    <a class="nav-link" href="#">
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

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-admin">
                            <h4 class="card-title">A busca pode ser feita por nome ou módulo de trabalho do
                                profissional</h4>
                            <form id="buscaProfissional" class="navbar-form">
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
                                <div class="table-responsive" style="overflow: auto; height: 600px;">
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

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                <div id="table_div"></div>
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
                        $("#buscaProfissional").submit();
                    }
                }
            </script>

            <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

            @foreach($profissionais as $prof)
                <div class="modal fade" id="modal{{$prof->id}}" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edição de profissionais</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div id="editPaciente" class="modal-body">
                                <div class=" container">
                                    <form id="form{{$prof->id}}">
                                        @csrf
                                        Nome: <label for="name{{$prof->id}}"></label>
                                        <input id="name{{$prof->id}}" name="name" class="form-control"
                                               value="{{$prof->name}}" required>
                                        <br>
                                        Localidade: <select name="localidade"
                                                            id="localidade" class="form-control">
                                            @foreach($localidades as $localidade)
                                                <option value="{{$localidade->id}}">{{$localidade->nome}}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        Email: <label for="email{{$prof->id}}"></label>
                                        <input id="email{{$prof->id}}" name="email" class="form-control"
                                               value="{{$prof->email}}" required>
                                        <br>
                                        <div class="row" style="float: right; left: 30%">
                                            <button type="submit" class="btn btn-success">Salvar mudanças
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <script>
                                    $(function () {
                                        $('form[id="form{{$prof->id}}"]').submit(function (event) {
                                            event.preventDefault();
                                            $.ajax({
                                                url: "{{route('alteraProfissional',['id'=>$prof->id])}}",
                                                type: "post",
                                                data: $(this).serialize(),
                                                dataType: 'json',
                                                success: function (response) {
                                                    if (response.success === true) {
                                                        $("#footer{{$prof->id}}").fadeIn();
                                                        $("#message{{$prof->id}}").text(response.message);
                                                        $.wait(function () {
                                                            $("#footer{{$prof->id}}").fadeOut();
                                                        }, 5);
                                                        $("#buscaProfissional").submit();
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
                            <div class="modal-footer" id="footer{{$prof->id}}" style="display: none">
                                <span id="message{{$prof->id}}" style="color: green"></span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <script>
                $(function () {
                    $('form[id="buscaProfissional"]').submit(function (event) {
                        event.preventDefault();
                        $.ajax({
                            url: "{{route('searchProfissional')}}",
                            type: "get",
                            data: $(this).serialize(),
                            dataType: 'json',
                            success: function (response) {
                                if (response.success === true) {
                                    var newRow = $("<tr>");
                                    var cols = "";
                                    cols += '<th>Nome</th>';
                                    cols += '<th>Função</th>';
                                    /*cols += '<th>Data Nascimento</th>';*/
                                    cols += '<th>CPF</th>';
                                    cols += '<th>Localidade</th>';
                                    cols += '<th>Email</th>';
                                    newRow.append(cols);

                                    $("#tableSearch").html("").append(newRow).fadeIn();
                                    //funcionou
                                    $.each(response.data, function (item, value) {
                                        var newRow = $("<tr>");
                                        var cols = "";
                                        cols += '<td>' + response.data[item]["name"] + '</td>';
                                        cols += '<td>' + response.data[item]["funcao"] + '</td>';
                                        /*cols += '<td>' + response.data[item]["data_nascimento"] + '</td>';*/
                                        cols += '<td>' + response.data[item]["cpf"] + '</td>';
                                        cols += '<td>' + response.data[item]["localidade"] + '</td>';
                                        cols += '<td>' + response.data[item]['email'] + '</td>';
                                        cols += '<td><a href="#" data-toggle="modal" data-target="#modal' + response.data[item]['id'] + '" style="width: 55px;"> <i class="material-icons" style="color: black;"title="Salvar Paciente">visibility</i></a>\n</td>';

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
                    $("#buscaProfissional").submit();
                })
            </script>


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
