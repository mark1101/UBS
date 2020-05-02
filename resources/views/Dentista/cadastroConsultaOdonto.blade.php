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
                <li class="nav-item dropdown active">
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
                    <a class="nav-link" href="{{route('indexRecadoOdonto')}}">
                        <i class="material-icons">chat
                        </i>
                        <p>Recados</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('historicoOdonto')}}">
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

        <!-- CADASTRO DE CONSULTA COMPLETA  -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- FORM DE CADASTRO DE CONSULTA  -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Ficha de Consulta Inicial</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('storeConsultaOdonto')}}" method="post">
                                    @csrf
                                    <h3 align="center">Identificação</h3>
                                    <div class="row">
                                        <div class="container">
                                            <label class="bmd-label-floating">Comunidade Atendida</label>
                                            <select style="text-transform: uppercase" class="form-control"
                                                    name="id_localidade" id="id_localidade">
                                                @foreach($localidades as $localidade)
                                                    <option
                                                        value="{{$localidade->id}}">{{$localidade->nome}}</option>
                                                @endforeach
                                            </select>
                                            <label class="bmd-label-floating">Paciente</label>
                                            <select style="text-transform: uppercase" class="form-control"
                                                    name="id_paciente" id="id_paciente">
                                                @foreach($pacientes as $paciente)
                                                    <option
                                                        value="{{$paciente->id}}">{{$paciente->nome}} {{$paciente->ultimo_nome}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <h3 align="center">Anamnese</h3>

                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="condicoes_higiene">Higiene</label>
                                                <select class="form-control" id="condicoes_higiene"
                                                        name="condicoes_higiene">
                                                    <option value="boa">Boa</option>
                                                    <option value="regular">Regular</option>
                                                    <option value="ruim">Ruim</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="uso_medicamento">Medicação</label>
                                                <select class="form-control" id="uso_medicamento"
                                                        name="uso_medicamento">
                                                    <option>Sim</option>
                                                    <option>Não</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="alergia">Alergia</label>
                                                <select class="form-control" id="alergia" name="alergia">
                                                    <option>Sim</option>
                                                    <option>Não</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="problemas_cardiaco">Problema Cardíaco</label>
                                                <select class="form-control" id="problemas_cardiaco"
                                                        name="problemas_cardiaco">
                                                    <option>Sim</option>
                                                    <option>Não</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="diabete">Diabetes</label>
                                                <select class="form-control" id="diabete" name="diabete">
                                                    <option>Sim</option>
                                                    <option>Não</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="sensibilidade">Sensibilidade nos Dentes</label>
                                                <select class="form-control" id="sensibilidade" name="sensibilidade">
                                                    <option>Sim</option>
                                                    <option>Não</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Outras Doenças</label>
                                                <input style="text-transform: uppercase" type="text" class="form-control" id="outras_doencas"
                                                       name="outras_doencas" required>
                                            </div>
                                        </div>
                                    </div>

                                    <h3 align="center"> Exame Intra-Oral</h3>

                                    <p class="card-category">Geral</p>
                                    <div class="row">

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="halitose">Halitose</label>
                                                <select class="form-control" id="halitose" name="halitose">
                                                    <option>Ausente</option>
                                                    <option>Leve</option>
                                                    <option>Forte</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="mucosa">Mucosa</label>
                                                <select class="form-control" id="mucosa" name="mucosa">
                                                    <option>Normal</option>
                                                    <option>Alterada</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Língua</label>
                                                <input style="text-transform: uppercase"type="text" class="form-control" id="lingua" name="lingua" required>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Palato Mole</label>
                                                <input style="text-transform: uppercase"type="text" class="form-control" id="palato_mole"
                                                       name="palato_mole" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Assoalho Bucal</label>
                                                <input style="text-transform: uppercase"type="text" class="form-control" id="assoalho_bucal"
                                                       name="assoalho_bucal" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Labios</label>
                                                <input style="text-transform: uppercase"type="text" class="form-control" id="labios" name="labios" required>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-category">Periodal</p>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="mucosa">Placa Bacteriana</label>
                                                <select class="form-control" id="placa_bacteriana"
                                                        name="placa_bacteriana">
                                                    <option>Ausente</option>
                                                    <option>Presente</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="mucosa">Sangramento Gengival</label>
                                                <select class="form-control" id="sangramento_gengival"
                                                        name="sangramento_gengival">
                                                    <option>Ausente</option>
                                                    <option>Presente</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="mucosa">Tartaro</label>
                                                <select class="form-control" id="tartaro" name="tartaro">
                                                    <option>Ausente</option>
                                                    <option>Presente</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="mucosa">Mobilidade Dental</label>
                                                <select class="form-control" id="mobilidade_dental"
                                                        name="mobilidade_dental">
                                                    <option>Ausente</option>
                                                    <option>Presente</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-category">Ortodôntico</p>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="mucosa">Apinhamento</label>
                                                <select class="form-control" id="apinhamento" name="apinhamento">
                                                    <option>Ausente</option>
                                                    <option>Leve</option>
                                                    <option>Severo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="mucosa">Diastemas</label>
                                                <select class="form-control" id="diastemas" name="diastemas">
                                                    <option>Ausente</option>
                                                    <option>Presente</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Observações</label>
                                                <textarea style="text-transform: uppercase;" class="form-control"
                                                          id="observacoes" name="observacoes" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Plano Tratamento</label>
                                                <textarea style="text-transform: uppercase;" class="form-control"
                                                          id="plano_tratamento" name="plano_tratamento"
                                                          rows="3" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary-adm">Cadastrar</button>
                                    <button class="btn btn-primary-adm"><a style="color: white" href="{{route('solicitacaoExameOdonto')}}">Solicitar Exame</a></button>
                                    <button class="btn btn-primary-adm"><a style="color: white" href="{{route('pdfConsulta')}}">Imprimir Ultima Consulta</a></button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
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
<script src="{{asset('js/plugins/nouislider.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js')}}"></script>
<script src="{{asset('js/plugins/arrive.min.js')}}"></script>


</body>

</html>
