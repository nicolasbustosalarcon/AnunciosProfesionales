@extends ('layouts.secretaria')
@section ('contenido')
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          @for($i=0; $i < 100; $i++)
          ['{{$categorias[$i]["categoria"]}}', {{$categorias[$i]["cantidad"]}}],
          @endfor
        ]);

        var options = {
          title: 'Distribucion de anuncios publiados por categoria'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
      
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>

@endsection