<?php 

include("../system/conexao.php");

try {
  $conexao = db_connect();
  $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conexao->exec("set names utf8");
} catch (PDOException $erro) {
  echo "Erro na conexão:" . $erro->getMessage();
}


$sql = "SELECT * FROM candidato, partido, votos WHERE candidato.partido = partido.idPartido AND votos.idCandidatoVoto = candidato.idCandidato";
$query = $conexao->query($sql);

$return = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Urna Eletronica</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  
  <style type="text/css" media="screen">   
  .botao-grafico button{
    position: absolute;
    right: 85px;
  }
</style>

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <a href="index.php">
          <img class="return" src="img/back-arrow.png" alt="">
        </a>
      </div>
    </div>
    <div style="margin-top:40px" class="row">
      <div class="col-md-12">
        <h2>Resultados da Eleição</h2>
      </div>
    </div>
    <div class="row" style="margin-top: 30px">
      <div class="col-md-1"></div>
      <div class="col-md-2">
        <button id="depEstadual" class="btn btn-primary btn-block" onclick="seleciona_div('depultado_estadual')">Deputado Estadual</button>
      </div>
      <div class="col-md-2">
        <button id="depEstadual" class="btn btn-success btn-block" onclick="seleciona_div('depultado_federal')">Deputado Federal</button>
      </div>
      <div class="col-md-2">
        <button id="depEstadual" class="btn btn-danger btn-block" onclick="seleciona_div('senador')">Senador</button>
      </div>
      <div class="col-md-2">
        <button id="depEstadual" class="btn btn-warning btn-block" onclick="seleciona_div('governador')">Governador</button>
      </div>
      <div class="col-md-2">
        <button id="depEstadual" class="btn btn-info btn-block" onclick="seleciona_div('presidente')">Presidente</button>
      </div>
    </div>

    <div style="margin-bottom:30px" id="div_depultado_estadual">
      <div class="row" style="margin-top:40px">
        <div class="col-md-12">
          <h3>Depultado Estadual</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Numero</th>
                <th>Partido</th>
                <th>Nome Candidato</th>
                <th>Quantidade de Votos</th>
              </tr>
            </thead>
            <tbody>
              <?php
              try {
                $stmt = $conexao->prepare("SELECT * FROM candidato, partido, votos 
                WHERE candidato.partido = partido.idPartido 
                AND votos.idCandidatoVoto = candidato.idCandidato 
                AND votos.tipoCandidato = '1' 
                ORDER BY votos.qtdVotos DESC");
                if ($stmt->execute()) {
                  while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr>";
                    echo "<td>" . $rs->numero
                    . "</td><td style='text-align: center'>" . $rs->descricao
                    . "</td><td style='text-align: center'>" . $rs->nomeCandidato
                    . "</td><td style='text-align: center'>" . $rs->qtdVotos
                    . "</td>";
                    echo "</tr>";
                  }
                } else {
                  echo "Erro: Não foi possível recuperar os dados do banco de dados";
                }
              } catch (PDOException $erro) {
                echo "Erro: " . $erro->getMessage();
              }  
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="botao-grafico">
        <a href="./chartDepultadoEstadual.php">
          <button type="" class="btn btn-primary">
            Visualizar em modo gráfico
          </button>
        </a>
      </div>
    </div>

    <div style="margin-bottom:30px" id="div_depultado_federal">
      <div class="row" style="margin-top:40px">
        <div class="col-md-12">
          <h3>Depultado Federal</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Numero</th>
                <th>Partido</th>
                <th>Nome Candidato</th>
                <th>Quantidade de Votos</th>
              </tr>
            </thead>
            <tbody>
              <?php
              try {
                $stmt = $conexao->prepare("SELECT * FROM candidato, partido, votos 
                WHERE candidato.partido = partido.idPartido 
                AND votos.idCandidatoVoto = candidato.idCandidato 
                AND votos.tipoCandidato = '2' 
                ORDER BY votos.qtdVotos DESC");
                if ($stmt->execute()) {
                  while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr>";
                    echo "<td>" . $rs->numero
                    . "</td><td style='text-align: center'>" . $rs->descricao
                    . "</td><td style='text-align: center'>" . $rs->nomeCandidato
                    . "</td><td style='text-align: center'>" . $rs->qtdVotos
                    . "</td>";
                    echo "</tr>";
                  }
                } else {
                  echo "Erro: Não foi possível recuperar os dados do banco de dados";
                }
              } catch (PDOException $erro) {
                echo "Erro: " . $erro->getMessage();
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="botao-grafico">
        <a href="./chartDepultadoFederal.php">
          <button type="" class="btn btn-primary">
            Visualizar em modo gráfico
          </button>
        </a>
      </div>
    </div>

    <div id="div_senador">
      <div class="row" style="margin-top:40px">
        <div class="col-md-12">
          <h3>Senador</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Numero</th>
                <th>Partido</th>
                <th>Nome Candidato</th>
                <th>Quantidade de Votos</th>
              </tr>
            </thead>
            <tbody>
              <?php
              try {
                $stmt = $conexao->prepare("SELECT * FROM candidato, partido, votos 
                WHERE candidato.partido = partido.idPartido 
                AND votos.idCandidatoVoto = candidato.idCandidato 
                AND votos.tipoCandidato = '3'
                ORDER BY votos.qtdVotos DESC");
                if ($stmt->execute()) {
                  while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr>";
                    echo "<td>" . $rs->numero
                    . "</td><td style='text-align: center'>" . $rs->descricao
                    . "</td><td style='text-align: center'>" . $rs->nomeCandidato
                    . "</td><td style='text-align: center'>" . $rs->qtdVotos
                    . "</td>";
                    echo "</tr>";
                  }
                } else {
                  echo "Erro: Não foi possível recuperar os dados do banco de dados";
                }
              } catch (PDOException $erro) {
                echo "Erro: " . $erro->getMessage();
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="botao-grafico">
        <a href="./chartSenador.php">
          <button type="" class="btn btn-primary">
            Visualizar em modo gráfico
          </button>
        </a>
      </div>
    </div>

    <div id="div_governador">
      <div class="row" style="margin-top:40px">
        <div class="col-md-12">
          <h3>Governador</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Numero</th>
                <th>Partido</th>
                <th>Nome Candidato</th>
                <th>Nome Vice</th>
                <th>Quantidade de Votos</th>
              </tr>
            </thead>
            <tbody>
              <?php
              try {
                $stmt = $conexao->prepare("SELECT * FROM candidato, partido, votos 
                WHERE candidato.partido = partido.idPartido 
                AND votos.idCandidatoVoto = candidato.idCandidato 
                AND votos.tipoCandidato = '4'
                ORDER BY votos.qtdVotos DESC");
                if ($stmt->execute()) {
                  while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr>";
                    echo "<td>" . $rs->numero
                    . "</td><td style='text-align: center'>" . $rs->descricao
                    . "</td><td style='text-align: center'>" . $rs->nomeCandidato
                    . "</td><td style='text-align: center'>" . $rs->nomeVice
                    . "</td><td style='text-align: center'>" . $rs->qtdVotos
                    . "</td>";
                    echo "</tr>";
                  }
                } else {
                  echo "Erro: Não foi possível recuperar os dados do banco de dados";
                }
              } catch (PDOException $erro) {
                echo "Erro: " . $erro->getMessage();
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="botao-grafico">
        <a href="./chartGovernador.php">
          <button type="" class="btn btn-primary">
            Visualizar em modo gráfico
          </button>
        </a>
      </div>
    </div>

    <div id="div_presidente">
      <div class="row" style="margin-top:40px">
        <div class="col-md-12">
          <h3>Presidente</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Numero</th>
                <th>Partido</th>
                <th>Nome Candidato</th>
                <th>Nome Vice</th>
                <th>Quantidade de Votos</th>
              </tr>
            </thead>
            <tbody>
              <?php
              try {
                $stmt = $conexao->prepare("SELECT * FROM candidato, partido, votos 
                WHERE candidato.partido = partido.idPartido 
                AND votos.idCandidatoVoto = candidato.idCandidato 
                AND votos.tipoCandidato = '5'
                ORDER BY votos.qtdVotos DESC");
                if ($stmt->execute()) {
                  while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr>";
                    echo "<td>" . $rs->numero
                    . "</td><td style='text-align: center'>" . $rs->descricao
                    . "</td><td style='text-align: center'>" . $rs->nomeCandidato
                    . "</td><td style='text-align: center'>" . $rs->nomeVice
                    . "</td><td style='text-align: center'>" . $rs->qtdVotos
                    . "</td>";
                    echo "</tr>";
                  }
                } else {
                  echo "Erro: Não foi possível recuperar os dados do banco de dados";
                }
              } catch (PDOException $erro) {
                echo "Erro: " . $erro->getMessage();
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="botao-grafico">
        <a href="./chartPresidente.php">
          <button type="" class="btn btn-primary">
            Visualizar em modo gráfico
          </button>
        </a>
      </div>
    </div>
  </div>
  <script src="js/resultados.js"></script>
</body>
</html>