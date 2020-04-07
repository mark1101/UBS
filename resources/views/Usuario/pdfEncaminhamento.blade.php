<!doctype html>
<html>
<body lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


</head>


@foreach($data as $valor)

    <div class="container">
        <h2 style="text-transform: uppercase ; " align="center">prefeitura municipal
            de {{($valor->localidade->sede)->nome}}</h2>
        <br><br>

        Paciente: <label for="">{{($valor->paciente)->nome}} {{($valor->paciente)->ultimo_nome}}</label>
        <br>
        Data de Nascimento: <label for="">{{($valor->paciente)->data_nascimento}}</label>
        <br>
        Idade: <label for="">{{($valor->paciente)->idade}}</label>
        <br>
        Num Sus: <label for="">{{($valor->paciente)->num_sus}}</label>
        <br>
        Municipio de Residência: <label for="">{{($valor->localidade->sede)->nome}}</label>
        <br>
        Endereco: <label for="">{{($valor->localidade)->nome}}</label>
        <br>
        Telefone: <label for="">{{($valor->paciente)->telefone}}</label>

        <br><br>

        <h1 align="center">ENCAMINHAMENTO</h1>
        <br><br><br>
        Especialidade Encaminhamento: <label style="text-transform: uppercase">{{$valor->especialidade_encaminhamento}}</label>
        <br>
        Observação: <label for="">{{$valor->observacao}}</label>
        <br>
        Objetivo: <label for="">{{$valor->objetivo}}</label>
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

