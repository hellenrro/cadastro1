<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/painel.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <style>
        .highcharts-figure, .highcharts-data-table table {
            min-width: 310px; 
            max-width: 800px;
            margin: 1em auto;
          }
          
          .highcharts-data-table table {
              font-family: Verdana, sans-serif;
              border-collapse: collapse;
              border: 1px solid #EBEBEB;
              margin: 10px auto;
              text-align: center;
              width: 100%;
              max-width: 500px;
          }
          .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
          }
          .highcharts-data-table th {
              font-weight: 600;
            padding: 0.5em;
          }
          .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
            padding: 0.5em;
          }
          .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
          }
          .highcharts-data-table tr:hover {
            background: #f1f7ff;
          }
        </style>
    <title>Dashboard</title>
</head>
<body>

    <div>
        <div class="">
            <h5> despesas</h5>
            <table class="row">
                <thead>
                    <th>id</th>
                        <th> data</th>
                           <th> valor</th>
                                <th> descrição</th>
                                    <th> imagem</th>
                </thead>
                <tbody>
                    @foreach ($despesas as $despesa)
                    <tr>
                        <td>{{$despesa->id}}</td>
                        <td>{{$despesa->data}}</td>
                        <td>{{$despesa->valor}}</td>
                        <td>{{$despesa->descricao}}</td>
                        <td><img class="card-img-top" src="/storage/{{$despesa->image}}"></td>
                        <td>
                            <a href="{{route('despesas.edit', $despesa->id)}}">editar</a>
                            <a href="{{route('despesa.delete', $despesa->id)}}">apagar</a>
    
                        </td>
                    </tr>
                 @endforeach
                </tbody>
            </table>
            <figure class="highcharts-figure">
                <div id="container"></div>
                <p class="highcharts-description">
                 teste
                </p>
              </figure>
        </div>
      
    </div>
</body>
</html>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
Highcharts.chart('container', {
   
    title: {
      text: 'Suas despesas'
    },
    xAxis: {
      reversed: false,
      title: {
        enabled: true,
        text: 'data'
      },
      labels: {
        format: '{value} km'
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
    
    tooltip: {
      headerFormat: '<b>{series.name}</b><br/>',
      pointFormat: '{point.x} : R${point.y}'
    },
    
    series: [{
      name: 'despesas',
      data: [[0, 15], [10, -50], [20, -56.5], [30, -46.5], [40, -22.1],
        [50, -2.5], [60, -27.7], [70, -55.7], [80, -70.5]]
    }]
  });
</script>
  