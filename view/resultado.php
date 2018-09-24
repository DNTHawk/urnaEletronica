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


$sql = "SELECT * FROM candidato, partido, votos WHERE candidato.partido = partido.idPartido AND votos.idCandidatoVoto = candidato.idCandidato";
$query = $conexao->query($sql);

$return = $query->fetchAll(PDO::FETCH_ASSOC);

$returnConvertidoJSON = json_encode($return);

<<<<<<< HEAD
echo "<script>let listaVotos = " . $returnConvertidoJSON . "</script>";
=======
echo "<script>let listaVotos = " . $returnConvertidoJSON . "
recebeLista(listaVotos)</script>";
>>>>>>> 223cc89e66ed16537f655375138a4be5c520bae9

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

        <div id="div_depultado_estadual">
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
                                $stmt = $conexao->prepare("SELECT * FROM candidato, partido, votos WHERE candidato.partido = partido.idPartido AND votos.idCandidatoVoto = candidato.idCandidato AND votos.tipoCandidato = '1'");
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
        </div>

        <div id="div_depultado_federal">
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
                                $stmt = $conexao->prepare("SELECT * FROM candidato, partido, votos WHERE candidato.partido = partido.idPartido 
                                AND votos.idCandidatoVoto = candidato.idCandidato AND votos.tipoCandidato = '2'");
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
                                $stmt = $conexao->prepare("SELECT * FROM candidato, partido, votos WHERE candidato.partido = partido.idPartido 
                                AND votos.idCandidatoVoto = candidato.idCandidato AND votos.tipoCandidato = '3'");
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
                                $stmt = $conexao->prepare("SELECT * FROM candidato, partido, votos WHERE candidato.partido = partido.idPartido 
                                AND votos.idCandidatoVoto = candidato.idCandidato AND votos.tipoCandidato = '4'");
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
                                $stmt = $conexao->prepare("SELECT * FROM candidato, partido, votos WHERE candidato.partido = partido.idPartido 
                                AND votos.idCandidatoVoto = candidato.idCandidato AND votos.tipoCandidato = '5'");
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
        </div>

        
    </div>
    
    <script src="js/resultados.js"></script>
</body>
</html>