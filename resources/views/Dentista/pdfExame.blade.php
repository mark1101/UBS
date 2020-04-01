<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @foreach($data as $valor)
        <title>PDF exame {{($valor->paciente)->nome}} {{($valor->paciente)->ultimo_nome}}</title>
    @endforeach
</head>
<body>


@foreach($data as $valor)

    <div class="container">
        <h2 style="text-transform: uppercase ; " align="center">prefeitura municipal
            de {{($valor->localidade->sede)->nome}}</h2>
        <br><br><br>
        Nome do Paciente: <label
            style="text-transform: uppercase">{{($valor->paciente)->nome}} {{($valor->paciente)->ultimo_nome}}</label>
        <br><br><br>
        Comunidade: <label style="text-transform: uppercase">{{($valor->localidade)->nome}}</label>
        <br><br><br>
        Raio-X: <label style="text-transform: uppercase">{{$valor->raio_x}}</label>
        <br>
        Sangue: <label style="text-transform: uppercase">{{$valor->sangue}}</label>
        <br>
        Tomografia: <label style="text-transform: uppercase">{{$valor->tomografia}}</label>
        <br>
        Ressonância: <label style="text-transform: uppercase">{{$valor->ressonancia}}</label>
        <br>
        Descição dos Exames: <label>{{$valor->descricao}}</label>
    </div>


    <br>
    <h3 align="center">Assinatura/Carimbo do Profissional</h3>
    <h2 align="center">___________________________________</h2>
@endforeach

</body>
</html>
