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
    <link href="{{asset('css/app.css')}}" rel="stylesheet"/>


</head>

<body>
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
                        <a style="color: black" id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                           role="button"
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
    <br><br>
    <div class="container">
        <img src="{{asset('img/iconLogin.png')}}" alt="">
    </div>
    <br><br>

    <div class="container">
        <h2>Administradores de cada Município</h2>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Login</th>
                <th scope="col">Senha</th>
                <th scope="col">Cidade</th>
            </tr>
            </thead>

            @foreach($adm as $a)
                <tbody>
                <tr>
                    <td>{{$a->name}}</td>
                    <td>{{$a->email}}</td>
                    <td>
                        <button type="submit" class="btn btn-primary">Alterar</button>
                    </td>
                    <td>{{($a->cidade_sede)}}</td>
                </tr>
                </tbody>

            @endforeach
        </table>
        <br><br>
        <h2>Sedes Cadastradas</h2>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
            </tr>
            </thead>

            @foreach($sedes as $s)
                <tbody>
                <tr>
                    <td>{{$s->id}}</td>
                    <td>{{$s->nome}}</td>
                </tr>
                </tbody>

            @endforeach
        </table>
        <form action="{{route('cadaSede')}}" method="post">
            @csrf
            <span>Cadastrar nova sede : </span>
            <input style="width: 350px" type="text" name="nome" id="nome">
            <button type="submit" class="btn btn-primary">enviar</button>
        </form>
    </div>

    <br><br><br><br><br>


    <footer class="footer">
        <div class="container-fluid">
        </div>
    </footer>
</div>


<!-- REFERENCIAS EM JS  -->
<script src="{{asset("js/core/jquery.min.js")}}"></script>
<script src="{{asset("js/core/popper.min.js")}}"></script>
<script src="{{asset("js/core/bootstrap-material-design.min.js")}}"></script>
<script src="{{asset("js/plugins/perfect-scrollbar.jquery.min.js")}}"></script>
<script src="{{asset("js/plugins/moment.min.js")}}"></script>
<script src="{{asset("js/plugins/sweetalert2.js")}}"></script>
<script src="{{asset("js/plugins/jquery.validate.min.js")}}"></script>
<script src="{{asset("js/plugins/jquery.bootstrap-wizard.js")}}"></script>
<script src="{{asset("js/plugins/bootstrap-selectpicker.js")}}"></script>
<script src="{{asset("js/plugins/bootstrap-datetimepicker.min.js")}}"></script>
<script src="{{asset("js/plugins/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("js/plugins/bootstrap-tagsinput.js")}}"></script>
<script src="{{asset("js/plugins/jasny-bootstrap.min.js")}}"></script>
<script src="{{asset("js/plugins/fullcalendar.min.js")}}"></script>
<script src="{{asset("js/plugins/jquery-jvectormap.js")}}"></script>
<script src="{{asset("js/plugins/nouislider.min.js")}}"></script>
<script src="{{asset("https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js")}}"></script>
<script src="{{asset("js/plugins/arrive.min.js")}}"></script>

</body>

</html>



