<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>População das Cidade</title>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});// o pacote corechart deixa a linha arredondada
        google.charts.setOnLoadCallback(drawChart);
  
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Cidade', 'População',{role: 'annotation'}],//Neste gráfico só temos duas colunas
            <?php
                include "conecta_1.php";
                $sql = "SELECT * FROM cidades";
                $buscar = mysqli_query($conexao,$sql);

                while ($dados = mysqli_fetch_array($buscar)) {
                  //Neste gráfico o while carregará informações de dois campos(cidade e população)
                  $cidade = $dados['cidade'];
                  $populacao = $dados['populacao'];
            ?>

            ['<?php echo $cidade ?>',  <?php echo $populacao ?>, <?php echo $populacao ?>],//O terceiro campo abastece {role: 'annotation'}

            <?php } ?>//Somente para fechar o while
          ]);
  
          var options = {
            title: 'Meu Primeiro Gráfico',//Dá pra mudar
            curveType: 'function',//ve do pacote corechart. Caso queira deixar a linha quebrada, comente esta limha de código
            legend: { position: 'bottom' }//Dá pra mudar o position ex.: right
          };
  
          var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
  
          chart.draw(data, options);
        }
      </script>
      
</head>
<body>
  <div id="curve_chart" style="width: 900px; height: 500px"></div>
</body>
</html>
  