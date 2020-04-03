<!doctype html>
<html>
<body lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--@foreach($data as $valor)
        <title>PDF Atestado {{($valor->paciente)->nome}} {{($valor->paciente)->ultimo_nome}}</title>
    @endforeach--}}
</head>


@foreach($data as $valor)

    <div class="container">
        {{--<h2 style="text-transform: uppercase ; " align="center">prefeitura municipal
            de {{($valor->localidade->sede)->nome}}</h2>--}}
        <br><br>
        <h1 align="center">ATESTADO MÉDICO</h1>
        <br><br><br>
        Unidade Básica de Saúde de: <label style="text-transform: uppercase">{{($valor->localidade)->nome}}</label>
        <br><br><br>
        Atesto que <label
            style="text-transform: uppercase">{{($valor->paciente)->nome}} {{($valor->paciente)->ultimo_nome}} </label>
        foi atendido(a) nesta UBS, nesta data,
        e que necessita de {{$valor->dias}} dias de afastamento do trabalho, para tratamento de saúde.
    </div>
    <br><br>

    <label style="text-transform: uppercase">{{($valor->localidade->sede)->nome}} </label> {{$valor->data}}


    <br><br><br>
    <h3 align="center">Assinatura/Carimbo do Profissional</h3>
    <br>
    <h2 align="center">___________________________________</h2>
@endforeach

</body>
</html>

