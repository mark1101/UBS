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
                    <a class="navbar-brand" href="javascript:;">Cadastro de ficha de visita</a>
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
                    <!-- CADASTRO DE PACIENTE -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h4 class="card-title">Cadastro Ficha</h4>
                            </div>
                            <div class="card-body">
                                <form id="cadastraFicha" {{--action="{{route('cadastraPaciente')}}" method="post"--}}>
                                    @csrf
                                    <p class="card-category">Chefe de familia para ser identificador</p>
                                    <div class="row">
                                        <div class="container">
                                            <select class="form-control" name="identificador" id="identificador">
                                                @foreach($pacientes as $paciente)
                                                    <option value="{{$paciente->nome}} {{$paciente->ultimo_nome}}">{{$paciente->nome}}
                                                        {{$paciente->ultimo_nome}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Descrição da visita</label>
                                                <textarea class="form-control"
                                                          id="descricao" name="descricao"
                                                          rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Problemas encontrados</label>
                                                <textarea class="form-control"
                                                          id="problemas" name="problemas"
                                                          rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Data da visita</label>
                                                <input type="text" class="form-control data" id="data"
                                                       name="data">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary-agente">Cadastrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

        <script>

            $(function () {
                $('form[id="cadastraFicha"]').submit(function (event) {
                    event.preventDefault();

                    $.ajax({
                        url: "{{route('cadastrouFicha')}}",
                        type: "POST",
                        data: $(this).serialize(),
                        dataType: 'json',
                        success : function (response) {
                            if(response.success === true){

                                $('#descricao').val("");
                                $('#problemas').val("");
                                $('#data').val("");

                                alert('Ficha cadastrada com sucesso!');

                            }else{


                            }
                        }
                    })
                })
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

<script src="{{asset('js/mascara.js')}}"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>


</body>

</html>
