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

<body class=""  >
<div class="wrapper ">

    <div class="sidebar" data-color="admin" data-background-color="white" data-image="../assets/img/unidade.jpg">
        <div class="logo"><a href="{{'/'}}" class="simple-text logo-normal">
                <img src="{{asset('img/adm.png')}}">
            </a></div>
        <div class="sidebar-wrapper ">
            <ul class="nav">
                <li class="nav-item ">
                    <a class="nav-link" href="{{'/'}}">
                        <i class="material-icons">home_work</i>
                        <p>Início</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('recadoAdm')}}">
                        <i class="material-icons">attach_file
                        </i>
                        <p>Recados</p>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link" href="{{route('mostraProblema')}}">
                        <i class="material-icons">report_problem
                        </i>
                        <p>Problemas com visitas</p>
                    </a>
                </li>
                <li class="nav-item  active">
                    <a class="nav-link" href="{{route('cadastroLocalidade')}}">
                        <i class="material-icons">house
                        </i>
                        <p>Cadastro Localidade</p>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link" href="{{route('cadastraProfissional')}}">
                        <i class="material-icons">person
                        </i>
                        <p>Cadastrar Profissionais</p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">directions_car</i>
                        Gestão de Viagens
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('cadastroMotorista')}}">Cadastros</a>
                        <a class="dropdown-item" href="#">Busca ou edição</a>
                    </div>
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
                        <a class="dropdown-item" href="#">Odontologia</a>
                    </div>
                </li>
            </ul>

        </div>
    </div>

    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">

                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:;">Gerenciamento de Exames</a>
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
                            <a style="color: black" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
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

            <!-- <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-admin">
                            <h4 class="card-title">Cadastro de Sede</h4>
                        </div>
                        <div class="card-body" id="exame">
                            <form action="{{route('storeSede')}}" method="post">
                                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nome da Cidade Sede</label>
                            <input type="text" class="form-control " id="nome"
                                   name="nome" disabled>
                        </div>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-admin" disabled>
                    Funcionalidade somente para o gerenciador do sistema
                </button>
            </form>
        </div>
    </div>
</div> -->


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-admin">
                            <h4 class="card-title">Cadastro de Localidade</h4>
                        </div>
                        <div class="card-body" id="exame">
                            <form id="cadastroLocalidade" {{--action="{{route('storeLocalidade')}}" method="post"--}}>
                                @csrf
                                <div class="container">
                                    <div class="row">
                                        <label class="bmd-label-floating">Nome da Sede</label>
                                        <select  class="form-control" name="id_sede" id="id_sede">
                                            @foreach($sedes as $sede)
                                                <option
                                                    value="{{$sede->id}}" style="text-transform: uppercase;">
                                                    {{$sede->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Nome da Localidade</label>
                                            <input type="text" class="form-control " id="nome"
                                                   name="nome" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" required>
                                            <span id="nomeLocalidade"></span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary-admin">Salvar
                                </button>
                                <!--<button type="submit" class="btn btn-primary pull-right">Solicitar Exame</button>-->
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-12" style="overflow: hidden">
                    <div class="card">
                        <div class="card-header card-header-admin">
                            <h4 class="card-title">Comunidades Cadastradas</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive" style="overflow: auto; height: 300px;">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th >Nome</th>
                                        <th>Pacientes</th>
                                        <th>Consultas</th>
                                        <th>Exames</th>
                                        <th>Encaminhamentos</th>
                                        <th>Vacinas</th>
                                        <th>Viagens Realizadas</th>
                                        <th>Consulta Odonto</th>
                                        <th>Tratamento Odonto</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($localidades as $localidade )
                                        <tr >
                                            <td>{{$localidade->nome}}</td>
                                            <td>{{$pacientes[$localidade->id]}}</td>
                                            <td>{{$consultas[$localidade->id]}}</td>
                                            <td>{{$exames[$localidade->id]}}</td>
                                            <td>{{$encaminhamentos[$localidade->id]}}</td>
                                            <td>{{$vacinas[$localidade->id]}}</td>
                                            <td>{{$viagens[$localidade->id]}}</td>
                                            <td>{{$consultaOdonto[$localidade->id]}}</td>
                                            <td>{{$tratamentoOdonto[$localidade->id]}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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

        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

        <script>

            $(function () {
                $('form[id="cadastroLocalidade"]').submit(function (event) {
                    event.preventDefault();

                    $.ajax({
                        url: "{{route('storeLocalidade')}}",
                        type: "POST",
                        data: $(this).serialize(),
                        dataType: 'json',
                        success : function (response) {
                            if(response.success === true){
                                console.log('aaae')
                                $("#nomeLocalidade").text("");
                                $('#nome').val("");

                                alert('Localidade cadastrada com sucesso!');

                            }else{
                                $("#nomeLocalidade").css({"color": "red", "font-size": "13px"}).text(response.errors.localidade);
                            }
                        }
                    })
                })
            })
        </script>

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
