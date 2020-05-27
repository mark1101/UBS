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
                <li class="nav-item active">
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
                    <a class="navbar-brand" href="javascript:;">Comunicação</a>
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
                                <h4 class="card-title">Nova Mensagem (as mensagens serão mandadas somente internamente)</h4>
                            </div>
                            <div class="card-body">
                                <form id="cadastroMensagem">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Para</label>
                                                <select class="form-control ls-select" name="destino" id="destino">
                                                    @foreach($profissionais as $pro)
                                                        <option value="{{$pro->id}}">{{$pro->funcao}} {{$pro->name}} {{$pro->ultimo_nome}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Mensagem</label>
                                                <textarea name="mensagem" id="mensagem" class="form-control" id="exampleFormControlTextarea1" rows="3" maxlength="50"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary-adm">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div id="modalSuccess" class="modal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="color: green">Sucesso!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Mensagem enviada com Sucesso!</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="modalError" class="modal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="color: green">Ops!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Algo de errado aconteceu :(!</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

                    <script>

                        $(function () {
                            $('form[id="cadastroMensagem"]').submit(function (event) {
                                event.preventDefault();

                                $.ajax({
                                    url: "{{route('cadastraRecadoOdonto')}}",
                                    type: "POST",
                                    data: $(this).serialize(),
                                    dataType: 'json',
                                    success : function (response) {
                                        if(response.success === true){

                                            $('#mensagem').val("");
                                            $('#modalSuccess').modal('show');

                                        }else{

                                            $('#modalError').modal('show');

                                        }
                                    }
                                })
                            })
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
