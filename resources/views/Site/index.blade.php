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


<header role="banner">
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
                        <a class="nav-link active" href="{{route('siteInicio')}}">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sobre')}}">SOBRE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contato')}}">CONTATO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cadastro')}}">CADASTRO DE MUNICÍPIO</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li><a href="{{route('inicio')}}" target="_blank" class="btn btn-primary px-3 py-2">ir ao sistema</a></li>
                </ul>

            </div>
        </div>
    </nav>
</header>
<!-- END header -->

<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{URL::asset('site/images/admin.jpg')}});">
        <div class="container">
            <div class="row slider-text align-items-center justify-content-center">
                <div class="col-md-10 text-center col-sm-12 element-animate">
                    <h1>cUBS</h1>
                    <p class="mb-5 sub-text">Sistema de gerenciamento a UBS de pequenos municipios</p>
                    <p><a href="{{route('sobre')}}" class="btn btn-white btn-outline-white px-3 py-3">Ver funcionalidades</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-item" style="background-image: url({{URL::asset('site/images/medico.jpeg')}});">
        <div class="container">
            <div class="row slider-text align-items-center justify-content-center">
                <div class="col-md-10 text-center col-sm-12 element-animate">
                    <h1>MÓDULO PARA MÉDICOS E ENFERMEIROS</h1>
                    <p class="mb-5 sub-text">Com funcionalidades adaptadas para atender as principais atividades
                        realizadas dentro das unidades de saúde</p>
                    <p><a href="{{route('sobre')}}" class="btn btn-white btn-outline-white px-3 py-3">Ver funcionalidade</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-item" style="background-image: url({{URL::asset('site/images/odonto.jpeg')}})">
        <div class="container">
            <div class="row slider-text align-items-center justify-content-center">
                <div class="col-md-10 text-center col-sm-12 element-animate">
                        <h1>MÓDULO ODONTOLÓGICO</h1>
                    <p class="mb-5 sub-text">Com funcionalidades adaptadas para atender as principais atividades
                        odontológicas realizadas dentro das unidades de saúde</p>
                    <p><a href="about.html" class="btn btn-white btn-outline-white px-3 py-3">Ver funcionalidades</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- END slider -->


<section class="section element-animate">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="media block-6 d-block text-center">
                    <div class="icon mb-3"><span class="ion-ios-bell-outline"></span></div>
                    <div class="media-body">
                        <h3 class="heading">Comunicação interna</h3>
                        <p>Sistema tem a capacidade de promover uma comunicação interna para os profissionais de cada
                            UBS.</p>
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-lg-4 ">
                <div class="media block-6 d-block text-center">
                    <div class="icon mb-3"><span class="ion-ios-heart-outline"></span></div>
                    <div class="media-body">
                        <h3 class="heading">Qualidade de atendimento</h3>
                        <p>cUBS possibilita aos profissionais um melhor gerenciamento das atividades realizadas.</p>
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-lg-4">
                <div class="media block-6 d-block text-center">
                    <div class="icon mb-3"><span class="ion-ios-bolt-outline"></span></div>
                    <div class="media-body">
                        <h3 class="heading">Velocidade de atendimento</h3>
                        <p>O sistema cUBS tem integrado um sistema de gerenciamento de entrada de paciente, que pode ser
                            mostrado diretamente ao profissional para agilizar o atendimento.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- END section -->
<section class="section element-animate">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-md-5 pr-md-5 mb-5">
                <div class="block-41">
                    <div class="block-41-subheading d-flex">
                        <div class="block-41-number">01</div>
                        <div class="block-41-line align-self-center mx-2"></div>
                        <div class="block-41-subheading-2">Infraestrutura</div>
                    </div>
                    <h2 class="block-41-heading mb-5">Vamos crescer juntos</h2>
                    <div class="block-41-text">
                        <p>Sistema todo pensado para atender de forma eficaz pequenos municipios, com design criativo e
                            cores especiais.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <img src="{{asset('site/images/infraestrutura.jpg')}}" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section class="section element-animate bg-light">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-md-5 pl-md-5 mb-5 order-md-2">
                <div class="block-41">
                    <div class="block-41-subheading d-flex">
                        <div class="block-41-number">02</div>
                        <div class="block-41-line align-self-center mx-2"></div>
                        <div class="block-41-subheading-2">Colaboração</div>
                    </div>
                    <h2 class="block-41-heading mb-5">Projeto inicial de um TCC</h2>
                    <div class="block-41-text">
                        <p>Sistema todo projetado por um aluno de faculdade publica morador de um pequeno municipio que
                            viu a possibilidade
                            de melhorar o gerenciamento da saúde. Assim escrever uma nova história para os moradores da
                            região. </p>
                    </div>
                </div>
            </div>
            <div class="col-md-7 order-md-1">
                <img src="{{asset('site/images/nova.jpg')}}" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section class="section bg-light block-11">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 text-center">
                <h2 class=" heading mb-4">Comentários sobre o cUBS</h2>
                <p class="mb-5 lead">Alguns dos pronunciamentos dos usuários do sistema.</p>
            </div>
        </div>
        <div class="nonloop-block-11 owl-carousel">
            <div class="item">
                <div class="block-33">
                    <div class="vcard d-flex mb-3">
                        <div class="image align-self-center"><img src="public/site/images/person_3.jpg" alt="Person here"></div>
                        <div class="name-text align-self-center">
                            <h2 class="heading">John Smith</h2>
                            <span class="meta">CEO, Co-Founder</span>
                        </div>
                    </div>
                    <div class="text">
                        <blockquote>
                            <p>&rdquo; Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquid. Atque
                                dolore esse veritatis iusto eaque perferendis non dolorem fugiat voluptatibus vitae
                                error ad itaque inventore accusantium tempore dolores sunt. &ldquo;</p>
                        </blockquote>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="block-33">
                    <div class="vcard d-flex mb-3">
                        <div class="image align-self-center"><img src="public/site/images/person_2.jpg" alt="Person here"></div>
                        <div class="name-text align-self-center">
                            <h2 class="heading">Joshua Darren</h2>
                            <span class="meta">CEO, Co-Founder</span>
                        </div>
                    </div>
                    <div class="text">
                        <blockquote>
                            <p>&rdquo; Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquid. Atque
                                dolore esse veritatis iusto eaque perferendis non dolorem fugiat voluptatibus vitae
                                error ad itaque inventore accusantium tempore dolores sunt. &ldquo;</p>
                        </blockquote>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="block-33">
                    <div class="vcard d-flex mb-3">
                        <div class="image align-self-center"><img src="public/site/images/person_3.jpg" alt="Person here"></div>
                        <div class="name-text align-self-center">
                            <h2 class="heading">John Smith</h2>
                            <span class="meta">CEO, Co-Founder</span>
                        </div>
                    </div>
                    <div class="text">
                        <blockquote>
                            <p>&rdquo; Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquid. Atque
                                dolore esse veritatis iusto eaque perferendis non dolorem fugiat voluptatibus vitae
                                error ad itaque inventore accusantium tempore dolores sunt. &ldquo;</p>
                        </blockquote>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="block-33">
                    <div class="vcard d-flex mb-3">
                        <div class="image align-self-center"><img src="images/person_3.jpg" alt="Person here"></div>
                        <div class="name-text align-self-center">
                            <h2 class="heading">John Smith</h2>
                            <span class="meta">CEO, Co-Founder</span>
                        </div>
                    </div>
                    <div class="text">
                        <blockquote>
                            <p>&rdquo; Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquid. Atque
                                dolore esse veritatis iusto eaque perferendis non dolorem fugiat voluptatibus vitae
                                error ad itaque inventore accusantium tempore dolores sunt. &ldquo;</p>
                        </blockquote>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- END .block-4 -->
</section>

<footer class="site-footer" role="contentinfo">
    <div class="container">
        <!--<div class="row mb-5">
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
                    </script>
                    All rights reserved | This template is made with <i class="fa fa-heart"
                                                                        aria-hidden="true"></i> by <a
                        href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>
<!-- END footer -->

<!-- loader -->
<div id="loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#f4b214"/>
    </svg>
</div>

<script src="{{asset('site/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('site/js/popper.min.js')}}"></script>
<script src="{{asset('site/js/bootstrap.min.js')}}"></script>
<script src="{{asset('site/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('site/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('site/js/main.js')}}"></script>

</body>
</html>
