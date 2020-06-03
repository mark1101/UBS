<!doctype html>
<html>
<body lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


</head>

<h2 align="center">Prefeitura Municipal
    de {{($valor->localidade->sede)->nome}}</h2>
<br><br>

Unidade Solicitando: <label for="">{{$valor->unidade_solicitada}} </label>
<br>
Exame requisitado: <label for="">{{$valor->nome_exame}} </label>
<br>
Observação: <label for="">{{$valor->observacao}} </label>
<br>
Data: <label for="">{{$valor->data}} </label>
<br>
<div class="row">

    Paciente: <label for="">{{($valor->paciente)->nome}} {{($valor->paciente)->ultimo_nome}}</label>
    <br>
    Idade: <label for="">{{($valor->paciente)->idade}}</label>
    <br>
    Num Sus: <label for="">{{($valor->paciente)->num_sus}}</label>
    <br>
    Endereco: <label for="">{{($valor->localidade)->nome}}</label>
    <br>
    Telefone: <label for="">{{($valor->paciente)->telefone}}</label>
    <br>

</div>
<br><br>
<h3>{{($valor->localidade->sede)->nome}}, {{$valor->data}}</h3>
<br>
<br>
<h3 align="center">Assinatura/Carimbo do Profissional</h3>
<br>
<h2 align="center">___________________________________</h2>


</body>
</html>

