<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Encaminhamento {{($data->paciente)->nome}} {{($data->paciente)->ultimo_nome}}</title>
</head>
<body>


<h2  align="center">Prefeitura Municipal
    de {{($data->localidade->sede)->nome}}</h2>
<h3 align="center">Encaminhamento Odontológico</h3>
<br><br><br>
Prezado(a) colega Dr(a) <label style="text-transform: uppercase">{{$data->nome_profissional}}</label>
encaminho meu paciente <label
    style="text-transform: uppercase">{{($data->paciente)->nome}} {{($data->paciente)->ultimo_nome}}</label> para
análise e indicação da conduta que julgar necessária, agradeço a atenção e aguardo seu parecer
<br><br>
Obs : <label>{{$data->observacao}}</label>
<br><br><br>
<label>{{($data->localidade->sede)->nome}}</label> , <label>{{$data->data}}</label>
<br>
<h3 align="center">Assinatura/Carimbo do Profissional</h3>
<h2 align="center">___________________________________</h2>


</body>
</html>
