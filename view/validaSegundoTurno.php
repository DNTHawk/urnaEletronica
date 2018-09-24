<?php 

include("../system/conexao.php");

try {
    $conexao = db_connect();
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
}

function validaTurnoPresidente(){
    global $conexao, $valorSoma, $porcVotosPresidente, $candidatoPresidente, $quantidadeVotosPresidente, $partidoPresidente;

    try {
        $stmt = $conexao->prepare("SELECT * FROM candidato, partido, votos WHERE candidato.partido = partido.idPartido 
    AND votos.idCandidatoVoto = candidato.idCandidato AND votos.tipoCandidato = '5' order by qtdVotos DESC LIMIT 1");
        $stmt->bindParam(1, $idPartido, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
            $idPartido = $rs->idPartido;
            $candidatoPresidente = $rs->nomeCandidato;
            $quantidadeVotosPresidente = $rs->qtdVotos;
            $partidoPresidente = $rs->descricao;
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
    try {
        $stmt = $conexao->prepare("SELECT SUM(qtdVotos) AS valor_soma FROM candidato, partido, votos WHERE candidato.partido = partido.idPartido 
    AND votos.idCandidatoVoto = candidato.idCandidato AND votos.tipoCandidato = '5' AND votos.numero <> 'BRANCO'");
        $stmt->bindParam(1, $idPartido, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
            $valorSoma = $rs->valor_soma;
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }

    $porcVotosPresidente = ($quantidadeVotosPresidente/$valorSoma)*100;

    if ($porcVotosPresidente > 51) {
        return true;
    }else {
        return false;
    }
}

function validaTurnoGovernador(){
    global $conexao, $valorSoma, $porcVotosGovernador, $candidatoGovernador, $quantidadeVotosGovernador, $partidoGovernador;

    try {
        $stmt = $conexao->prepare("SELECT * FROM candidato, partido, votos WHERE candidato.partido = partido.idPartido 
    AND votos.idCandidatoVoto = candidato.idCandidato AND votos.tipoCandidato = '4' order by qtdVotos DESC LIMIT 1");
        $stmt->bindParam(1, $idPartido, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
            $idPartido = $rs->idPartido;
            $candidatoGovernador = $rs->nomeCandidato;
            $quantidadeVotosGovernador = $rs->qtdVotos;
            $partidoGovernador = $rs->descricao;
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
    try {
        $stmt = $conexao->prepare("SELECT SUM(qtdVotos) AS valor_soma FROM candidato, partido, votos WHERE candidato.partido = partido.idPartido 
    AND votos.idCandidatoVoto = candidato.idCandidato AND votos.tipoCandidato = '4' AND votos.numero <> 'BRANCO'");
        $stmt->bindParam(1, $idPartido, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
            $valorSoma = $rs->valor_soma;
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }

    $porcVotosGovernador = ($quantidadeVotosGovernador/$valorSoma)*100;

    if ($porcVotosGovernador > 51) {
        return true;
    }else {
        return false;
    }
}

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
        <div class="row" style="margin-top:30px; margin-left:20px">
            <div class="col-md-12">
                <h1>Resumo Resultados 1 Turno</h1>
            </div>
        </div>

        <div class="row" style="margin-top: 30px">
            <div class="col-md-4"></div>
            <div class="col-md-2">
                <button id="governador" class="btn btn-warning btn-block" onclick="seleciona_div('governador')">Governador</button>
            </div>
            <div class="col-md-2">
                <button id="presidente" class="btn btn-info btn-block" onclick="seleciona_div('presidente')">Presidente</button>
            </div>
        </div>

        <div id="div_governador">
            <div class="row">
                <h3 style="margin-left:15px">Governador</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (validaTurnoGovernador()) {
                        ?>
                        <div class="row">
                            <div class="col-md-5">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Candidatura:</td>
                                        <td>Governador</td>
                                    </tr>
                                    <tr>
                                        <td>Ganhador:</td>
                                        <td><?php echo ($candidatoGovernador); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Partido:</td>
                                        <td><?php echo ($partidoGovernador); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Quantidade Votos:</td>
                                        <td><?php echo ($quantidadeVotosGovernador); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Porcentagem:</td>
                                        <td><?php echo (number_format($porcVotosGovernador, 2, ',', '')); ?>%</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <?php
                    }else {
                        ?>
                        <div class="row">
                            <div class="col-md-5">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Candidatura:</td>
                                        <td>Governador</td>
                                    </tr>
                                    <tr>
                                        <td>Ganhador:</td>
                                        <td><?php echo ($candidatoGovernador); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Partido:</td>
                                        <td><?php echo ($partidoGovernador); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Quantidade Votos:</td>
                                        <td><?php echo ($quantidadeVotosGovernador); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Porcentagem:</td>
                                        <td><?php echo (number_format($porcVotosGovernador, 2, ',', '')); ?>%</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="color:green">Realizar 2˚ Turno</h3>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="div_presidente">
            <div class="row">
                <h3>Presidente</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if (validaTurnoPresidente()) {
                        ?>
                        <div class="row">
                            <div class="col-md-5">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Candidatura:</td>
                                        <td>Presidente</td>
                                    </tr>
                                    <tr>
                                        <td>Ganhador:</td>
                                        <td><?php echo ($candidatoPresidente); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Partido:</td>
                                        <td><?php echo ($partidoPresidente); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Quantidade Votos:</td>
                                        <td><?php echo ($quantidadeVotosPresidente); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Porcentagem:</td>
                                        <td><?php echo (number_format($porcVotosPresidente, 2, ',', '')); ?>%</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <?php

                    } else {
                        ?>
                        <div class="row">
                            <div class="col-md-5">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Candidatura:</td>
                                        <td>Governador</td>
                                    </tr>
                                    <tr>
                                        <td>Ganhador:</td>
                                        <td><?php echo ($candidatoGovernador); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Partido:</td>
                                        <td><?php echo ($partidoGovernador); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Quantidade Votos:</td>
                                        <td><?php echo ($quantidadeVotosGovernador); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Porcentagem:</td>
                                        <td><?php echo (number_format($porcVotosGovernador, 2, ',', '')); ?>%</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="color:green">Realizar 2˚ Turno</h3>
                            </div>
                        </div>
                        <?php

                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="js/validaTurno.js"></script>
</body>
</html>