<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF consulta Odonto </title>
</head>
<body>

    <h2 style="text-transform: uppercase ; " align="center">prefeitura municipal de {{($data->sede)->nome}}</h2>
    <br><br><br>
    Nome do Paciente: <label style="text-transform: uppercase">{{($data->paciente)->nome}} {{($data->paciente)->ultimo_nome}}</label>
    <br><br><br>
    Comunidade: <label style="text-transform: uppercase">{{($data->localidade)->nome}}</label>
    <br><br><br>
    Inicio do Tratamento: <label style="text-transform: uppercase">{{$data->inicio_tratamento}}</label>
    <br><br><br>
    <h2 align="center">Anamnese</h2>
    Higiene: <label style="text-transform: uppercase">{{$data->condicoes_higiene}}</label>
    <br>
    Uso Medicamento : <label style="text-transform: uppercase">{{$data->uso_medicamento}}</label> <h2>________________________________________</h2>
    <br>
    Alergia : <label style="text-transform: uppercase">{{$data->alergia}}</label>
    <br>
    Problemas Cardíaco : <label style="text-transform: uppercase">{{$data->problemas_cardiaco}}</label>
    <br>
    Diabete : <label style="text-transform: uppercase">{{$data->diabete}}</label>
    <br>
    Outras Doenças :<label style="text-transform: uppercase">{{$data->outras_doencas}}</label>
    <br>
    Sensibilidade : <label style="text-transform: uppercase">{{$data->sensibilidade}}</label>
    <br>
    <h2 align="center">Intra-Horal</h2>
    <br>
    Halitose : <label style="text-transform: uppercase">{{$data->halitose}}</label>
    <br>
    Mucosa : <label style="text-transform: uppercase">{{$data->mucosa}}</label>
    <br>
    Língua : <label style="text-transform: uppercase">{{$data->lingua}}</label>
    <br>
    Palato Mole : <label style="text-transform: uppercase">{{$data->palato_mole}}</label>
    <br>
    Assoalho Bucal : <label style="text-transform: uppercase">{{$data->assoalho_bucal}}</label>
    <br>
    Lábios : <label style="text-transform: uppercase">{{$data->labios}}</label>
    <br>
    Placa Bacteriana: <label style="text-transform: uppercase">{{$data->placa_bacteriana}}</label>
    <br>
    Sangramento Gengival : <label style="text-transform: uppercase">{{$data->sangramento_gengival}}</label>
    <br>
    Tártaro : <label style="text-transform: uppercase">{{$data->tartaro}}</label>
    <br>
    Mobilidade Dental : <label style="text-transform: uppercase">{{$data->mobilidade_dental}}</label>
    <br>
    Apinhamento : <label style="text-transform: uppercase">{{$data->apinhamento}}</label>
    <br>
    Diastemas : <label style="text-transform: uppercase">{{$data->diastemas}}</label>
    <br>
    Obervações : <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{$data->observacoes}}</textarea>
    Plano de Tratamento: <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{$data->plano_tratamento}}</textarea>

    <br><br><br><br>

    <h3 align="center">Assinatura/Carimbo do Profissional</h3>
    <h2 align="center">___________________________________</h2>


</body>
</html>
