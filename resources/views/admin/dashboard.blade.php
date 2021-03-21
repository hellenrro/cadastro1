<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/painel.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body >
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-8 mt-2 ">
              <div id="container"></div>
            </div>
            <div class="col-sm-4 d-flex flex-column justify-content-center mt-2" id="container-total">
               <h5 class="text-center" id="titulos">Total de despesas</h5> 
               <h2 class="text-center" id="textos">${{$sum}}</h2>
               <a href="{{route('despesas.create.index')}}" ><center><button class="btn btn-success col-sm-10" id="btn-rosa">Adicionar despesas</button></center></a>
            </div>
        </div>
        @if(count($despesas)>0)
        @foreach ($despesas as $despesa)
          <div>
              <div class="row mt-4" ml-0 style="background-color: #1f1f1f;">
                <img class "img-responsive " style="width: 280px; height: 140px; object-fit: cover; margin: 0 auto;" src="/storage/{{$despesa->image}}" alt="">
                   <div class="col d-flex justify-content-between py-4" id="container-despesas">
                      <div class="d-flex info">
                          <label>protocolo:{{$despesa->id}} </label>
                          <label>R${{$despesa->valor}}</label>
                          <label>{{ date('d/m/Y', strtotime($despesa->data))}}</label>
                      </div>
                      <div class="description d-flex justify-content-center align-items-center overflow-auto " ><label class="description text-center">{{$despesa->descricao}}</label>
                        <div class="row">
                          <div class="d-flex justify-content-center "> 
                              <div class="mx-5">
                                <a href="/storage/{{$despesa->image}}"><ion-icon name="eye-outline"></ion-icon></a>
                              </div>
                              <div class="mx-5">
                                <a href="{{route('despesa.delete', $despesa->id)}}" ><ion-icon name="trash-outline"></ion-icon></a>
                              </div>
                              <div class="mx-5">
                                <a href="{{route('despesas.edit.index', $despesa->id)}}" ><ion-icon name="pencil-outline"></ion-icon> </a>
                              </div>
                          </div>
                        </div>
                      </div>
                   </div>
              </div>
           </div>      
        @endforeach
        @endif
        @if(count($despesas) == 0)
          <div class="row mt-4 align-items-center" id="container-sem-cadastro">
            <center><h5 id="texto-rosa">Nenhuma despesa cadastrada no momento </h5></center>
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
    var categories = <?php echo json_encode($dates) ?>;
    var data = <?php echo json_encode($values) ?>;
    console.log(categories);
    console.log(data);
  Highcharts.chart('container', {
    
    title: {
      text: 'Suas despesas'
    },
    xAxis: {
      categories,
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
    chart:{
      backgroundColor:"#1f1f1f",
      height:"300px",
    },
    tooltip: {
      headerFormat: '<b>{series.name}</b><br/>',
      pointFormat: '{point.x} : R${point.y}'
    },
    
    series: [{
      name: 'despesas',
      data
    }]
  });
</script>
  