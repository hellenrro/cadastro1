<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/painel.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <title>Painel Principal</title>
</head>

<body>
    
    <div class="container mt-5">
        <div class="row mt-4">
            <a href="{{ route('user.logout') }}"><button class="btn btn-success col-sm-2 mt-3 m-3 " id="btn-preto"> logout</button></a>
        </div>
        <div class="row">
            <div class="col-sm-8 mt-2 ">
                <div id="container"></div>
            </div>
            <div class="col-sm-4 d-flex flex-column justify-content-center mt-2" id="container-total">
                <h5 class="text-center" id="titulos">Total de despesas</h5>
                <h2 class="text-center" id="textos">${{ $sum }}</h2>
                <a href="{{ route('despesas.create.index') }}">
                    <center><button class="btn btn-success col-sm-10" id="btn-rosa">Adicionar despesas</button></center>
                </a>
                <a href="{{ route('gerenciar.categoria') }}">
                    <center><button class="btn btn-success col-sm-10 mt-2" id="btn-laranja">Gerenciar
                            Categorias</button></center>
                </a>
            </div>
        </div>

        <div class="container mt-2">
            <form method="GET">
                <div class="row ">
                    <div class="col-sm-3">
                        <label>Categoria</label>
                        <select class="form-control"  name="categoria">
                            @if (count($categorias) > 0)
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-sm-2 mt-4 ">
                        <button type="submit" class=" btn" id="btn-rosa">Filtrar</button>
                    </div>
                </div>
            </form>
        </div>



        @if (count($despesas) > 0)
            @foreach ($despesas as $despesa)
                <div>
                    <div class="row mt-4" id="container-despesas-principal" >
                        <img class "img-responsive " id="img" src="/storage/{{ $despesa->image }}" alt="">
                        <div class="col d-flex justify-content-between py-4" id="container-despesas">
                            <div class="d-flex info">
                                <label>Protocolo:{{ $despesa->id }} </label>
                                <label>R${{ $despesa->valor }}</label>
                                <label>{{ date('d/m/Y', strtotime($despesa->data)) }}</label>
                            </div>
                            <div class="description d-flex justify-content-center align-items-center overflow-auto ">
                                <label class="description text-center">{{ $despesa->descricao }}</label>
                            </div>
                            <div class="row">
                                <div class="d-flex justify-content-center ">
                                    <div class="mx-5">
                                        <a href="/storage/{{ $despesa->image }}">
                                            <ion-icon name="eye-outline"></ion-icon>
                                        </a>
                                    </div>
                                    <div class="mx-5">
                                        <a href="{{ route('despesa.delete', $despesa->id) }}">
                                            <ion-icon name="trash-outline"></ion-icon>
                                        </a>
                                    </div>
                                    <div class="mx-5">
                                        <a href="{{ route('despesas.edit.index', $despesa->id) }}">
                                            <ion-icon name="pencil-outline"></ion-icon>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        @if (count($despesas) == 0)
            <div class="row mt-4 align-items-center" id="container-sem-cadastro">
                <center>
                    <h5 id="texto-rosa">Nenhuma despesa cadastrada no momento </h5>
                </center>
            </div>
        @endif
    </div>
</body>

</html>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    var data = <?php echo json_encode($dates); ?>;    
    var valor = <?php echo json_encode($valores); ?>;   
    Highcharts.chart('container', {

        title: {
            text: 'Suas despesas'
        },
        xAxis: {
            categories:data,
            title: {
                text: 'data'
            },


            maxPadding: 0.05,
            showLastLabel: true
        },
        yAxis: {
            title: {
                text: 'valor'
            },
            labels: {
                format: 'R${value}'
            },

            lineWidth: 2
        },
        chart: {
            backgroundColor: "#1f1f1f",
            height: "300px",
        },
        tooltip: {
            headerFormat: '<b>{series.name}</b><br/>',
            pointFormat: '{point.x} : R${point.y}'
        },

        series: [{
            name: 'despesas',
            data:valor
        }]
    });

</script>
