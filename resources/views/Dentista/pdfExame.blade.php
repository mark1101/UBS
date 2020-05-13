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
    <h2 align="center">Prefeitura Municipal
        de {{($data->localidade->sede)->nome}}</h2>
    <h3 align="center">Solicitação de exames complementares</h3>
    <br><br><br>
    Nome do Paciente: <label
        style="text-transform: uppercase">{{($data->paciente)->nome}} {{($data->paciente)->ultimo_nome}}</label>
    <br><br>
    Unidade Basica de: <label style="text-transform: uppercase">{{($data->localidade)->nome}}</label>
    <br><br><br>
    Raio-X: <label style="text-transform: uppercase">{{$data->raio_x}}</label>
    @if($data->raio_x == "Sim")
        ,_____________________________________________
        <br>
    @endif
    <br>
    @if($data->sangue == "Sim")
        <br>
    @endif
    Sangue: <label style="text-transform: uppercase">{{$data->sangue}}</label>
    @if($data->sangue == "Sim")
        ,_____________________________________________
        <br>
    @endif
    <br>
    @if($data->tomografia == "Sim")
        <br>
    @endif
    Tomografia: <label style="text-transform: uppercase">{{$data->tomografia}}</label>
    @if($data->tomografia == "Sim")
        ,_____________________________________________
        <br>
    @endif
    <br>
    @if($data->ressonancia == "Sim")
        <br>
    @endif
    Ressonância: <label style="text-transform: uppercase">{{$data->ressonancia}}</label>
    @if($data->ressonancia == "Sim")
        ,_____________________________________________
        <br>
    @endif
    <br>
    Descição dos Exames: <label>{{$data->descricao}}</label>
    <br><br>
    <h3>{{($data->localidade->sede)->nome}}, {{date('d/m/Y',strtotime($data->created_at))}}</h3>
</div>


<br>
<h3 align="center">Assinatura/Carimbo do Profissional</h3>
<h2 align="center">___________________________________</h2>

</body>
</html>
