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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

</head>

<body>
  <canvas id="myChart" width="400" height="180"></canvas>
  <script>
    let nomeCandidatos = []
    let qtdVotos = []
    for (let i in listaVotosPresidentes) {
      nomeCandidatos.push(listaVotosPresidentes[i].nomeCandidato)
      qtdVotos.push(listaVotosPresidentes[i].qtdVotos)
    }

    let ctx = document.getElementById("myChart");
    let myChart = new Chart(ctx, {
      type: 'horizontalBar',
      data: {
        labels: nomeCandidatos,
        datasets: [{
          label: '# of Votes',
          data: qtdVotos,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
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
</body>

</html>