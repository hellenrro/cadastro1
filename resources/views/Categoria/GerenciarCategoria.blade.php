<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/painel.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>Categorias</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row mt-4">
            <a href="{{ route('user.logout') }}"><button class="btn btn-success col-sm-2 mt-3 m-3 " id="btn-preto">
                    logout</button></a>
        </div>
        <div class="row">
            <div class="col-sm-4 d-flex flex-column justify-content-center mt-2" id="container-total-Categoria">
                <a href="{{ route('categoria.create.index') }}">
                    <center><button class="btn btn-success col-sm-10" id="btn-rosa">Adicionar Categorias</button>
                    </center>
                </a>
                <a href="{{ route('dashboard.index') }}">
                    <center><button class="btn btn-success col-sm-10 mt-2" id="btn-laranja">voltar para
                            Dashboard</button></center>
                </a>
            </div>
            <div class="col-sm-8 mt-2 ">
                <div id="container"></div>
            </div>
        </div>


        <div class="col-sm-12 d-flex flex-column mt-2 ">
            <table class="table table-dark">
                @if (count($categorias) > 0)
                    <thead>
                        <tr>
                            <th scope="col">
                                protocolo
                            </th>
                            <th scope="col">
                                nome
                            </th>

                            <th scope="col">
                                ação
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $categoria)
                            <tr>
                                <th scope="row">
                                    {{ $categoria->id }}
                                </th>
                                <td>
                                    {{ $categoria->nome }}
                                </td>

                                <td><a href="{{ route('categoria.delete', $categoria->id) }}">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                @endif
            </table>
        </div>
        @if (count($categorias) == 0)
            <div class="row mt-4 align-items-center" id="container-sem-cadastro">
                <center>
                    <h5 id="texto-rosa">Nenhuma categoria cadastrada</h5>
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
    var categorias = <?php echo json_encode($cat); ?>;

    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            backgroundColor: "#1f1f1f",
            height: "300px",
            type: 'pie'
        },
        title: {
            text: 'Porcentagem de Gastos por Categoria'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },

        series: [{
            name: 'total',
            colorByPoint: true,
            data: categorias

        }]
    });

</script>
