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
                    <a class="nav-link" href="{{route('encaminhamentoOdonto')}}">
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
                <li class="nav-item  ">
                    <a class="nav-link" href="{{route('atestadoOdonto')}}">
                        <i class="material-icons">assignment_late
                        </i>
                        <p>Atestados</p>
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

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">Ficha de Solicitação de Exame</h4>
                            </div>
                            <div class="card-body">
                                <form id="cadastroSolicitacao" >
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
                                    <h3 align="center">Ficha de Exames</h3>

                                    <p class="card-category">Geral</p>
                                    <p>Urgência na atenção basica : atendimento prestado a pacientes acometidos por quadros
                                    agudos ou adudizações de patologias crônicas, de baixa complexidade, deverão ter seu atendimento
                                    garantido na UBS, sem agendamento prévio</p>
                                    <p>Atendimento Ambulatorial : realização de procedimentos odontológicos com agendamento prévio</p>
                                    <p>Demanda espontânea : busca do usuário á unidade de saúde de forma não programada pelo serviço, independente
                                    do motivo ou do tempo de evolução do problema, podendo ou não apresentar queixa clínica</p>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="problemas_cardiaco">Radiografia</label>
                                                <select style="text-transform: uppercase" class="form-control" id="raio_x"
                                                        name="raio_x">
                                                    <option>Não</option>
                                                    <option>Sim</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="problemas_cardiaco">Sangue</label>
                                                <select style="text-transform: uppercase" class="form-control" id="sangue"
                                                        name="sangue">
                                                    <option>Não</option>
                                                    <option>Sim</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="problemas_cardiaco">Tomografia</label>
                                                <select style="text-transform: uppercase" class="form-control" id="tomografia"
                                                        name="tomografia">
                                                    <option>Não</option>
                                                    <option>Sim</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="problemas_cardiaco">Ressonância Magnética</label>
                                                <select style="text-transform: uppercase" class="form-control" id="ressonancia"
                                                        name="ressonancia">
                                                    <option>Não</option>
                                                    <option>Sim</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Descrição dos Exames</label>
                                                <textarea  class="form-control"
                                                          id="descricao" name="descricao"
                                                          rows="3" maxlength="150" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary-adm">Cadastrar</button>
                                    <a href="{{route('pdfExame')}}" class="btn btn-primary-adm">Gerar impressao</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

        <script !src="">
            $(function () {
                $('form[id="cadastroSolicitacao"]').submit(function (event) {
                    event.preventDefault();

                    $.ajax({
                        url: "{{route('storeSolicitacaoExameOdonto')}}",
                        type: "POST",
                        data: $(this).serialize(),
                        dataType: 'json',
                        success: function (response) {
                            if (response.success === true) {

                                $('#descricao').val("");
                                alert('Solicitação cadastrada com sucesso!');

                            } else {

                                alert('Erro ao cadastrar!');

                            }
                        }
                    })
                })
            })

        </script>

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
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js')}}"></script>
<script src="{{asset('js/plugins/arrive.min.js')}}"></script>


<script src="{{asset('js/mascara.js')}}"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>


</body>

</html>
