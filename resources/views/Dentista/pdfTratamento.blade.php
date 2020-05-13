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


    <h2  align="center">Prefeitura Municipal
        de {{($data->localidade->sede)->nome}}</h2>
    <h3 align="center">Tratamento Odontológico</h3>
    <br><br><br>
    Nome do Paciente: <label
        style="text-transform: uppercase">{{($data->paciente)->nome}} {{($data->paciente)->ultimo_nome}}</label>
    <br><br><br>
    Unidade Basica de : <label style="text-transform: uppercase">{{($data->localidade)->nome}}</label>
    <br><br><br>
    Procedimento Executado:
    <br>
    <label>{{$data->tratamento_executado}}</label>
    <br><br><br>
    Tipo:
    <label style="text-transform: uppercase">{{$data->tipo}}</label>
    <br><br>
    Data: <label>{{$data->data}}</label>
    <br>
    <h3 align="center">Assinatura/Carimbo do Profissional</h3>
    <h2 align="center">___________________________________</h2>


</body>
</html>
