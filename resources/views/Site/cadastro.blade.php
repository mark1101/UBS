<!doctype html>
<html lang="en">
<head>
    <title>cUBS Site</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('site/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/fonts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/fonts/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}">

</head>
<body>
<header role="banner" style="background-color: black ; top: 0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a style="font-size: 25px ; color: white" href="{{route('siteInicio')}}">cUBS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05"
                    aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample05">
                <ul class="navbar-nav pl-md-5">
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('siteInicio')}}">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sobre')}}">SOBRE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contato')}}">CONTATO</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('cadastro')}}">CADASTRO DE MUNICÍPIO</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</header>
<!-- END header -->
<br><br>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-5 order-2">
                <form action="{{route('cadastroPedido')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="name">Nome do município</label>
                            <input type="text" id="nome_municipio" name="nome_municipio" class="form-control ">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="phone">Telefone</label>
                            <input type="text" id="telefone" name="telefone" class="form-control ">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="email">Email da prefeitura para contato</label>
                            <input type="email" id="email" name="email" class="form-control ">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="phone">CEP do município</label>
                            <input type="text" id="cep" name="cep" class="form-control ">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>Mensagem de observação</label>
                            <textarea  id="mensagem" name="mensagem" class="form-control " cols="30" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="submit" value="Enviar pedido de cadastro" class="btn btn-primary px-3 py-3">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 order-2 mb-5">
                <div class="row justify-content-right">
                    <div class="col-md-8 mx-auto contact-form-contact-info">
                        <p class="d-flex">
                            <span class="ion-ios-location icon mr-5"></span>
                            <span>153 Guarapuava PR - 20 São José / Santa Maria do Oeste PR</span>
                        </p>

                        <p class="d-flex">
                            <span class="ion-ios-telephone icon mr-5"></span>
                            <span>(42) 9 9905-8933</span>
                        </p>

                        <p class="d-flex">
                            <span class="ion-android-mail icon mr-5"></span>
                            <span>cubs_sistema@hotmail.com</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>






<footer class="site-footer" role="contentinfo">
    <div class="container">
       <!-- <div class="row mb-5">
            <div class="col-md-4 mb-5">
                <h3>About The Hexa Template</h3>
                <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus et dolor blanditiis consequuntur ex voluptates perspiciatis omnis unde minima expedita.</p>
                <ul class="list-unstyled footer-link d-flex footer-social">
                    <li><a href="#" class="p-2"><span class="fa fa-twitter"></span></a></li>
                    <li><a href="#" class="p-2"><span class="fa fa-facebook"></span></a></li>
                    <li><a href="#" class="p-2"><span class="fa fa-linkedin"></span></a></li>
                    <li><a href="#" class="p-2"><span class="fa fa-instagram"></span></a></li>
                </ul>

            </div>
            <div class="col-md-5 mb-5 pl-md-5">
                <h3>Contact Info</h3>
                <ul class="list-unstyled footer-link">
                    <li class="d-block">
                        <span class="d-block">Address:</span>
                        <span class="text-white">34 Street Name, City Name Here, United States</span></li>
                    <li class="d-block"><span class="d-block">Telephone:</span><span class="text-white">+1 242 4942 290</span></li>
                    <li class="d-block"><span class="d-block">Email:</span><span class="text-white">info@yourdomain.com</span></li>
                </ul>
            </div>
            <div class="col-md-3 mb-5">
                <h3>Quick Links</h3>
                <ul class="list-unstyled footer-link">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Disclaimers</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-3">

            </div>
        </div>-->
        <div class="row">
            <div class="col-12 text-md-center text-left">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart"
                                                                                  aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>
<!-- END footer -->

<!-- loader -->
<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

<script src="{{asset('site/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('site/js/popper.min.js')}}"></script>
<script src="{{asset('site/js/bootstrap.min.js')}}"></script>
<script src="{{asset('site/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('site/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('site/js/main.js')}}"></script>


</body>
</html>
