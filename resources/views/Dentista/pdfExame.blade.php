<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>PDF tratamento {{($data->paciente)->nome}} {{($data->paciente)->ultimo_nome}}</title>
</head>
<body>


    <div class="container">
        <h2 style="text-transform: uppercase ; " align="center">prefeitura municipal
            de {{($data->localidade->sede)->nome}}</h2>
        <br><br><br>
        Nome do Paciente: <label
            style="text-transform: uppercase">{{($data->paciente)->nome}} {{($data->paciente)->ultimo_nome}}</label>
        <br><br><br>
        Comunidade: <label style="text-transform: uppercase">{{($data->localidade)->nome}}</label>
        <br><br><br>
        Raio-X: <label style="text-transform: uppercase">{{$data->raio_x}}</label>
        <br>
        Sangue: <label style="text-transform: uppercase">{{$data->sangue}}</label>
        <br>
        Tomografia: <label style="text-transform: uppercase">{{$data->tomografia}}</label>
        <br>
        Ressonância: <label style="text-transform: uppercase">{{$data->ressonancia}}</label>
        <br>
        Descição dos Exames: <label>{{$data->descricao}}</label>
    </div>


    <br>
    <h3 align="center">Assinatura/Carimbo do Profissional</h3>
    <h2 align="center">___________________________________</h2>

</body>
</html>
