<?php 

include("../system/conexao.php");

try {
    $conexao = db_connect();
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
}

try {
    $stmt = $conexao->prepare("SELECT * FROM candidato, partido, votos WHERE candidato.partido = partido.idPartido 
    AND votos.idCandidatoVoto = candidato.idCandidato AND votos.tipoCandidato = '5' order by qtdVotos DESC LIMIT 1");
    $stmt->bindParam(1, $idPartido, PDO::PARAM_INT);
    if ($stmt->execute()) {
        $rs = $stmt->fetch(PDO::FETCH_OBJ);
        $idPartido = $rs->idPartido;
        $candidato = $rs->nomeCandidato;
        $quantidadeVotos = $rs->qtdVotos;
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

function validaTurno(){
    global $valorSoma, $quantidadeVotos;

    $porcVotos = ($quantidadeVotos/$valorSoma)*100;

    if ($porcVotos > 51) {
        return "Ganhador 1 Turno";
    }else {
        return "Realizar 2 Turno";
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
        <div class="row" style="margin-top:20px">
            <div class="col-md-12">
                <h1>Resumo Resultados 1 Turno</h1>
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-md-4">
                <p>Candidato Vencedor: <?php echo($candidato) ?></p>
            </div>
            <div class="col-md-4">
                <p> Quantidade de Votos: <?php echo ($quantidadeVotos) ?></p>
            </div>
        </div>
        <div class="row" style="margin-top:20px">
            <div class="col-md-4">
                <p>Quantidade Total de Votos <?php echo($valorSoma) ?></p>
            </div>
        </div>
    </div>
</body>
</html>