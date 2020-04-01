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




@foreach($data as $valor)

    <h2 style="text-transform: uppercase ; " align="center">prefeitura municipal de {{($valor->localidade->sede)->nome}}</h2>
    <br><br><br>
    Nome do Paciente: <label style="text-transform: uppercase">{{($valor->paciente)->nome}} {{($valor->paciente)->ultimo_nome}}</label>
    <br><br><br>
    Comunidade: <label style="text-transform: uppercase">{{($valor->localidade)->nome}}</label>
    <br><br><br>
    Inicio do Tratamento: <label style="text-transform: uppercase">{{$valor->inicio_tratamento}}</label>
    <br><br><br>
    <h2 align="center">Anamnese</h2>
    Higiene: <label style="text-transform: uppercase">{{$valor->condicoes_higiene}}</label>
    <br>
    Uso Medicamento : <label style="text-transform: uppercase">{{$valor->uso_medicamento}}</label> <h2>________________________________________</h2>
    <br>
    Alergia : <label style="text-transform: uppercase">{{$valor->alergia}}</label>
    <br>
    Problemas Cardíaco : <label style="text-transform: uppercase">{{$valor->problemas_cardiaco}}</label>
    <br>
    Diabete : <label style="text-transform: uppercase">{{$valor->diabete}}</label>
    <br>
    Outras Doenças :<label style="text-transform: uppercase">{{$valor->outras_doencas}}</label>
    <br>
    Sensibilidade : <label style="text-transform: uppercase">{{$valor->sensibilidade}}</label>
    <br>
    <h2 align="center">Intra-Horal</h2>
    <br>
    Halitose : <label style="text-transform: uppercase">{{$valor->halitose}}</label>
    <br>
    Mucosa : <label style="text-transform: uppercase">{{$valor->mucosa}}</label>
    <br>
    Língua : <label style="text-transform: uppercase">{{$valor->lingua}}</label>
    <br>
    Palato Mole : <label style="text-transform: uppercase">{{$valor->palato_mole}}</label>
    <br>
    Assoalho Bucal : <label style="text-transform: uppercase">{{$valor->assoalho_bucal}}</label>
    <br>
    Lábios : <label style="text-transform: uppercase">{{$valor->labios}}</label>
    <br>
    Placa Bacteriana: <label style="text-transform: uppercase">{{$valor->placa_bacteriana}}</label>
    <br>
    Sangramento Gengival : <label style="text-transform: uppercase">{{$valor->sangramento_gengival}}</label>
    <br>
    Tártaro : <label style="text-transform: uppercase">{{$valor->tartaro}}</label>
    <br>
    Mobilidade Dental : <label style="text-transform: uppercase">{{$valor->mobilidade_dental}}</label>
    <br>
    Apinhamento : <label style="text-transform: uppercase">{{$valor->apinhamento}}</label>
    <br>
    Diastemas : <label style="text-transform: uppercase">{{$valor->diastemas}}</label>
    <br>
    Obervações : <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{$valor->observacoes}}</textarea>
    Plano de Tratamento: <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{$valor->plano_tratamento}}</textarea>

    <br><br><br><br>

    <h3 align="center">Assinatura/Carimbo do Profissional</h3>
    <h2 align="center">___________________________________</h2>
@endforeach

</body>
</html>
