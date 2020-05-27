<!doctype html>
<html>
<body lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PDF Atestado {{($data->paciente)->nome}} {{($data->paciente)->ultimo_nome}}</title>
</head>


    <div class="container">
        <h2 style="text-transform: uppercase ; " align="center">prefeitura municipal
            de {{($data->localidade->sede)->nome}}</h2>
        <br><br>
        <h1 align="center">ATESTADO MÉDICO ODONTOLÓGICO</h1>
        <br><br><br>
        Unidade Básica de Saúde de: <label style="text-transform: uppercase">{{($data->localidade)->nome}}</label>
        <br><br><br>
        Atesto que <label
            style="text-transform: uppercase">{{($data->paciente)->nome}} {{($data->paciente)->ultimo_nome}} </label>
        foi atendido(a) nesta UBS, nesta data,
        e que necessita de {{$data->dias}} dias de afastamento do trabalho, para tratamento.
    </div>
    <br><br>

    <label >{{($data->localidade->sede)->nome}}, </label> {{$data->data}}


    <br><br><br>
    <h3 align="center">Assinatura/Carimbo do Profissional</h3>
    <br>
    <h2 align="center">___________________________________</h2>


</body>
</html>

