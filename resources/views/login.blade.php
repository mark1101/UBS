<link
    href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css')}}">
<script src="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js')}}"></script>
<script src="{{asset('//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>
<!------ Include the above in your HEAD tag ---------->

<style>
    @import url('https://fonts.googleapis.com/css?family=Mukta');

    body {
        font-family: 'Mukta', sans-serif;
        height: 100vh;
        min-height: 550px;
        background-image: ;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        position: relative;
        overflow-y: hidden;
    }

    a {
        text-decoration: none;
        color: #444444;
    }

    .login-reg-panel {
        position: relative;
        top: 50%;
        transform: translateY(-50%);
        text-align: center;
        width: 70%;
        right: 0;
        left: 0;
        margin: auto;
        height: 400px;
        background-color: #9C27B0;
        border-radius: 10px;
    }

    .white-panel {
        background-color: rgba(255, 255, 255, 1);
        height: 500px;
        position: absolute;
        top: -50px;
        width: 50%;
        right: calc(50% - 50px);
        transition: .3s ease-in-out;
        z-index: 0;
        box-shadow: 0 0 15px 9px #00000096;
    }

    .login-reg-panel input[type="radio"] {
        position: relative;
        display: none;
    }

    .login-reg-panel {
        color: #B8B8B8;
    }

    .login-reg-panel #label-login,
    .login-reg-panel #label-register {
        border: 1px solid #9E9E9E;
        padding: 5px 5px;
        width: 150px;
        display: block;
        text-align: center;
        border-radius: 10px;
        cursor: pointer;
        font-weight: 600;
        font-size: 18px;
    }

    .login-info-box {
        width: 30%;
        padding: 0 50px;
        top: 20%;
        left: 0;
        position: absolute;
        text-align: left;
    }

    .register-info-box {
        width: 30%;
        padding: 0 50px;
        top: 20%;
        right: 0;
        position: absolute;
        text-align: left;
        color: white;
    }

    .right-log {
        right: 50px !important;
    }

    .login-show,
    .register-show {
        z-index: 1;
        display: none;
        opacity: 0;
        transition: 0.3s ease-in-out;
        color: #242424;
        text-align: left;
        padding: 50px;
    }

    .show-log-panel {
        display: block;
        opacity: 0.9;
    }

    .login-show input[type="text"], .login-show input[type="password"] {
        width: 100%;
        display: block;
        margin: 20px 0;
        padding: 15px;
        border: 1px solid #b5b5b5;
        outline: none;
    }

    .login-show input[type="button"] {
        max-width: 150px;
        width: 100%;
        background: #444444;
        color: #f9f9f9;
        border: none;
        padding: 10px;
        text-transform: uppercase;
        border-radius: 2px;
        float: right;
        cursor: pointer;
    }

    .login-show a {
        display: inline-block;
        padding: 10px 0;
    }

    .register-show input[type="text"], .register-show input[type="password"] {
        width: 100%;
        display: block;
        margin: 20px 0;
        padding: 15px;
        border: 1px solid #b5b5b5;
        outline: none;
    }

    .register-show input[type="button"] {
        max-width: 150px;
        width: 100%;
        background: #444444;
        color: #f9f9f9;
        border: none;
        padding: 10px;
        text-transform: uppercase;
        border-radius: 2px;
        float: right;
        cursor: pointer;
    }

    .credit {
        position: absolute;
        bottom: 10px;
        left: 10px;
        color: #3B3B25;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        font-size: 12px;
        font-weight: bold;
        letter-spacing: 1px;
        z-index: 99;
    }

    a {
        text-decoration: none;
        color: #2c7715;
    }


</style>

<script>

    $(document).ready(function () {
        $('.login-info-box').fadeOut();
        $('.login-show').addClass('show-log-panel');
    });


    $('.login-reg-panel input[type="radio"]').on('change', function () {
        if ($('#log-login-show').is(':checked')) {
            $('.register-info-box').fadeOut();
            $('.login-info-box').fadeIn();

            $('.white-panel').addClass('right-log');
            $('.register-show').addClass('show-log-panel');
            $('.login-show').removeClass('show-log-panel');

        } else if ($('#log-reg-show').is(':checked')) {
            $('.register-info-box').fadeIn();
            $('.login-info-box').fadeOut();

            $('.white-panel').removeClass('right-log');

            $('.login-show').addClass('show-log-panel');
            $('.register-show').removeClass('show-log-panel');
        }
    });


</script>

<div class="login-reg-panel">


    <div class="register-info-box">
        <h2>Login de Usuário</h2>
        <p>texto aqui</p>

        <!-- <label id="label-login" for="log-login-show">Entrar</label>
         <input type="radio" name="active-log-panel" id="log-login-show"> -->
    </div>

    <div class="white-panel">
        <div class="login-show">
            <h2 align="center">LOGIN</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input id="email" type="text" placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control"  @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="password" placeholder="Digite a sua senha" type="password" class="form-control  @error('password') is-invalid @enderror"
                       name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <a href="">Esqueceu a Senha ? </a>
                <br>
                <button type="submit" class="btn btn-primary" >Entrar</button>
            </form>
        </div>

    </div>
</div>
