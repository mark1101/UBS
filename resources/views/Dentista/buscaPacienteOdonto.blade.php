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

<body class="" >
<div class="wrapper ">

    <div class="sidebar" data-color="azure" data-background-color="white" data-image="../assets/img/unidade.jpg">
        <div class="logo"><a href="#" class="simple-text logo-normal">
                <img src="{{asset('img/dente.png')}}">
            </a></div>
        <div class="sidebar-wrapper ">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('admOdonto')}}">
                        <i class="material-icons">home_work</i>
                        <p>Início</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('agendaDentista')}}">
                        <i class="material-icons">calendar_today
                        </i>
                        <p>Agenda</p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">record_voice_over</i>
                        Consultas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('cadastroConsultaOdonto')}}">Nova Consulta</a>
                        <a class="dropdown-item" href="{{route('tratamentoOdonto')}}">Ficha Tratamento</a>
                        <a class="dropdown-item" href="{{route('solicitacaoExameOdonto')}}">Solicitação de Exame Complementar</a>
                    </div>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link" href="#">
                        <i class="material-icons">trending_flat
                        </i>
                        <p>Encaminhamento</p>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link" href="">
                        <i class="material-icons">chat
                        </i>
                        <p>Recados</p>
                    </a>
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


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- DIV DE BUSCA DE PACIENTE -->
                    <div class="col-md-12">

                        <!-- PARTE DE CIMA DA TABELA PARA PESQUISA -->
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">A busca pode ser feita por nome, CPF ou número do SUS</h4>
                                <form id="buscaPaciente" class="navbar-form">
                                    @csrf
                                    <div class="input-group no-border">
                                        <input onkeyup="submitForm()" type="text" style="color:white;" id="criterio" name="criterio"
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
                            if($("#criterio").val() === ""){
                                $("#tableSearch").html("");
                            }else{
                                $("#buscaPaciente").submit();
                            }
                        }
                    </script>

                    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>


                    @foreach($pacientes as $paciente)
                        <div class="modal fade" id="modal{{$paciente->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div id="editPaciente" class="modal-body">
                                        <div class=" container">
                                            <form id="form{{$paciente->id}}">
                                                @csrf
                                                Nome: <label for="name{{$paciente->id}}"></label>
                                                <input id="name{{$paciente->id}}" name="nome" class="form-control"
                                                       value="{{$paciente->nome}}" required disabled>
                                                <br>
                                                Ultimo nome: <label for="ultimo{{$paciente->id}}"></label>
                                                <input id="ultimo{{$paciente->id}}" name="ultimo_nome"
                                                       class="form-control"
                                                       value="{{$paciente->ultimo_nome}}" required disabled>
                                                <br>
                                                Telefone: <label for="name{{$paciente->id}}"></label>
                                                <input id="name{{$paciente->id}}" name="telefone" class="form-control"
                                                       value="{{$paciente->telefone}}" required disabled>
                                                <br>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <script>

                        $(function () {
                            $('form[id="buscaPaciente"]').submit(function (event) {
                                event.preventDefault();
                                $.ajax({
                                    url: "{{route('odontoPaciente')}}",
                                    type: "post",
                                    data: $(this).serialize(),
                                    dataType: 'json',
                                    success: function (response) {
                                        if (response.success === true) {
                                            var newRow = $("<tr>");
                                            var cols = "";
                                            cols += '<th>Nome</th>';
                                            cols += '<th>Data Nascimento</th>';
                                            cols += '<th>Num Sus</th>';
                                            cols += '<th>CPF</th>';
                                            cols += '<th>Localidade</th>';
                                            cols += '<th>Telefone</th>';
                                            newRow.append(cols);

                                            $("#tableSearch").html("").append(newRow).fadeIn();
                                            //funcionou
                                            $.each(response.data, function (item, value) {
                                                var newRow = $("<tr>");
                                                var cols = "";
                                                cols += '<td>' + response.data[item]["nome"] + " " + response.data[item]["ultimo_nome"] + '</td>';
                                                cols += '<td>' + response.data[item]["data_nascimento"] + '</td>';
                                                cols += '<td>' + response.data[item]["num_sus"] + '</td>';
                                                cols += '<td>' + response.data[item]["cpf"] + '</td>';
                                                cols += '<td>' + response.data[item]['localidade']['nome'] + '</td>';
                                                cols += '<td>' + response.data[item]['telefone'] + '</td>';
                                                cols += '<td><a  data-toggle="modal" data-target="#modal' + response.data[item]['id'] + '" style="width: 55px;"> <i class="material-icons" style="color: black;"title="Salvar Paciente">edit</i></a>\n</td>';

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
                        function getPacienteForEdit(id) {
                            $.ajax({
                                url: "{{route('puxaPacinete',['id' => '_replace_'])}}".replace('_replace_', id),
                                type: "get",
                                data: $(this).serialize(),
                                dataType: 'json',
                                success: function (response) {
                                    if (response.success === true) {
                                        $("#editPaciente").html('<p class="text-success">Teste</p>');

                                    }
                                }
                            });
                        }
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
