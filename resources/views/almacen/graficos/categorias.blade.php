@extends ('layouts.secretaria')
@section ('contenido')
<html>
  <head>
    <h3>Ingreso Total en la categoria {{$categoria_consulta[0]->nombre}}: {{$ingreso[0]->publicado_count}}</h3>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

      	var publicados = {{$contador_publicados[0]->publicado_count}};
      	var espera={{$contador_espera[0]->espera_count}};
      	var eliminados={{$contador_eliminados[0]->eliminado_count}};
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Publicados' , publicados],
          ['En espera',  espera],
          ['Rechazados', eliminados]
        ]);

        var options = {
          title: 'Informe General {{$categoria_consulta[0]->nombre}}'
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