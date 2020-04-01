<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @foreach($data as $valor)
        <title>PDF tratamento {{($valor->paciente)->nome}} {{($valor->paciente)->ultimo_nome}}</title>
    @endforeach
</head>
<body>


@foreach($data as $valor)

    <h2 style="text-transform: uppercase ; " align="center">prefeitura municipal
        de {{($valor->localidade->sede)->nome}}</h2>
    <br><br><br>
    Nome do Paciente: <label
        style="text-transform: uppercase">{{($valor->paciente)->nome}} {{($valor->paciente)->ultimo_nome}}</label>
    <br><br><br>
    Comunidade: <label style="text-transform: uppercase">{{($valor->localidade)->nome}}</label>
    <br><br><br>
    Procedimento Executado:
    <br>
    <label style="text-transform: uppercase">{{$valor->tratamento_executado}}</label>
    <br><br><br>
    Tipo da Consulta:
    <label style="text-transform: uppercase">{{$valor->tipo}}</label>
    <br><br>
    Data: <label>{{$valor->data}}</label>
    <br>
    <h3 align="center">Assinatura/Carimbo do Profissional</h3>
    <h2 align="center">___________________________________</h2>
@endforeach

</body>
</html>
