<?php
include("../system/conexao.php");

echo "<script src='./js/generateChart.js'></script>";

try {
  $conexao = db_connect();
  $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conexao->exec("set names utf8");
} catch (PDOException $erro) {
  echo "Erro na conexão:" . $erro->getMessage();
}

include("./consultaVotos.php");

echo "<script>let listaVotos = " . $returnConvertidoJSON . "
  recebeLista(listaVotos)</script>";
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Votos - Deputados Estaduais</title>
  <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <a href="resultado.php">
          <img style="top: 0; left: 50px" class="return" src="img/back-arrow.png" alt="">
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h1 style="text-align: center;">Depultado Estadual</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 offset-1">
        <canvas id="myChartDepultadoEstadual" width="400" height="180"></canvas>
        <script>
          let nomeCandidatosDepultadoEstadual = []
          let qtdVotosDepultadoEstadual = []
          for (let i in listaVotosDeputadosEstaduais) {
            nomeCandidatosDepultadoEstadual.push(listaVotosDeputadosEstaduais[i].nomeCandidato)
            qtdVotosDepultadoEstadual.push(listaVotosDeputadosEstaduais[i].qtdVotos)
          }

          let ctx = document.getElementById("myChartDepultadoEstadual");
          let myChartDepultadoEstadual = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
              labels: nomeCandidatosDepultadoEstadual,
              datasets: [{
                label: '# de Votos',
                data: qtdVotosDepultadoEstadual,
                backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(0, 100, 0, 0.2)',
                  'rgba(139, 69, 19, 0.2)',
                  'rgba(0, 128, 128, 0.2)',
                  'rgba(112, 128, 144, 0.2)',
                  'rgba(25, 25, 112, 0.2)'
                ],
                borderColor: [
                  'rgba(255,99,132,1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)',
                  'rgba(0, 100, 0, 1)',
                  'rgba(139, 69, 19, 1)',
                  'rgba(0, 128, 128, 1)',
                  'rgba(112, 128, 144, 1)',
                  'rgba(25, 25, 112, 1)'
                ],
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true
                  }
                }]
              }
            }
          });
        </script>
      </div>
    </div>
  </div>
</body>

</html>