<?php 

include("../system/conexao.php");

try {
    $conexao = db_connect();
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
}

$depultadoEstadual = $_POST['depultadoEstadual'];
$depultadoFederal = $_POST['depultadoFederal'];
$senador = $_POST['senador'];
$governador = $_POST['governador'];
$presidente = $_POST['presidente'];

if ($depultadoEstadual != "") {

    $sql = "SELECT * FROM votos WHERE numero = '$depultadoEstadual' AND tipoCandidato = '1'";
    $stmt = $conexao->prepare($sql);

    $stmt->execute();

    $rs = $stmt->fetch(PDO::FETCH_OBJ);
    
    if ($rs) {
        $sql = "SELECT * FROM candidato WHERE numero = '$depultadoEstadual' AND tipoCandidato = '1'";
        $stmt = $conexao->prepare($sql);

        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $idCandidato = $rs->idCandidato;

                if ($idCandidato != "") {
                    $stmt = $conexao->prepare("UPDATE votos SET qtdVotos = qtdVotos + 1 WHERE idCandidatoVoto='$idCandidato'");

                    $stmt->execute();
                    break;
                }
            }
        }
    }
    else{
        $sql = "SELECT * FROM candidato WHERE numero = '$depultadoEstadual'";
        $stmt = $conexao->prepare($sql);
    
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $idCandidato = $rs->idCandidato;
                $tipoCandidato = $rs->tipoCandidato;
    
                if ($idCandidato != "") {
                    $stmt = $conexao->prepare("INSERT INTO votos (idCandidatoVoto, numero, tipoCandidato, qtdVotos) 
                    VALUES ('$idCandidato', '$depultadoEstadual', '$tipoCandidato', '1')");
    
                    $stmt->execute();

                    break;
                }
            }
        }
    }
}
if ($depultadoFederal != "") {

    $sql = "SELECT * FROM votos WHERE numero = '$depultadoFederal' AND tipoCandidato = '2'";
    $stmt = $conexao->prepare($sql);

    $stmt->execute();

    $rs = $stmt->fetch(PDO::FETCH_OBJ);

    if ($rs) {
        $sql = "SELECT * FROM candidato WHERE numero = '$depultadoFederal' AND tipoCandidato = '2'";
        $stmt = $conexao->prepare($sql);

        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $idCandidato = $rs->idCandidato;

                if ($idCandidato != "") {
                    $stmt = $conexao->prepare("UPDATE votos SET qtdVotos = qtdVotos + 1 WHERE idCandidatoVoto='$idCandidato'");

                    $stmt->execute();
                    break;
                }
            }
        }
    } else {
        $sql = "SELECT * FROM candidato WHERE numero = '$depultadoFederal' AND tipoCandidato = '2'";
        $stmt = $conexao->prepare($sql);

        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $idCandidato = $rs->idCandidato;
                $tipoCandidato = $rs->tipoCandidato;

                if ($idCandidato != "") {
                    $stmt = $conexao->prepare("INSERT INTO votos (idCandidatoVoto, numero, tipoCandidato, qtdVotos) 
                    VALUES ('$idCandidato', '$depultadoFederal', '$tipoCandidato', '1')");

                    $stmt->execute();
                    break;
                }
            }
        }
    }
}
if ($senador != "") {

    $sql = "SELECT * FROM votos WHERE numero = '$senador' AND tipoCandidato = '3'";
    $stmt = $conexao->prepare($sql);

    $stmt->execute();

    $rs = $stmt->fetch(PDO::FETCH_OBJ);

    if ($rs) {
        $sql = "SELECT * FROM candidato WHERE numero = '$senador' AND tipoCandidato = '3'";
        $stmt = $conexao->prepare($sql);

        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $idCandidato = $rs->idCandidato;

                if ($idCandidato != "") {
                    $stmt = $conexao->prepare("UPDATE votos SET qtdVotos = qtdVotos + 1 WHERE idCandidatoVoto='$idCandidato'");

                    $stmt->execute();
                    break;
                }
            }
        }
    } else {
        $sql = "SELECT * FROM candidato WHERE numero = '$senador' AND tipoCandidato = '3'";
        $stmt = $conexao->prepare($sql);

        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $idCandidato = $rs->idCandidato;
                $tipoCandidato = $rs->tipoCandidato;

                if ($idCandidato != "") {
                    $stmt = $conexao->prepare("INSERT INTO votos (idCandidatoVoto, numero, tipoCandidato, qtdVotos) 
                    VALUES ('$idCandidato', '$senador', '$tipoCandidato', '1')");

                    $stmt->execute();
                    break;
                }
            }
        }
    }
}
if ($governador != "") {

    $sql = "SELECT * FROM votos WHERE numero = '$governador' AND tipoCandidato = '4'";
    $stmt = $conexao->prepare($sql);

    $stmt->execute();

    $rs = $stmt->fetch(PDO::FETCH_OBJ);

    if ($rs) {
        $sql = "SELECT * FROM candidato WHERE numero = '$governador' AND tipoCandidato = '4'";
        $stmt = $conexao->prepare($sql);

        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $idCandidato = $rs->idCandidato;

                if ($idCandidato != "") {
                    $stmt = $conexao->prepare("UPDATE votos SET qtdVotos = qtdVotos + 1 WHERE idCandidatoVoto='$idCandidato'");
                    $stmt->execute();
                    break;
                }
            }
        }
    } else {
        $sql = "SELECT * FROM candidato WHERE numero = '$governador' AND tipoCandidato = '4'";
        $stmt = $conexao->prepare($sql);

        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $idCandidato = $rs->idCandidato;
                $tipoCandidato = $rs->tipoCandidato;

                if ($idCandidato != "") {
                    $stmt = $conexao->prepare("INSERT INTO votos (idCandidatoVoto, numero, tipoCandidato, qtdVotos) 
                    VALUES ('$idCandidato', '$governador', '$tipoCandidato', '1')");

                    $stmt->execute();
                    break;
                }
            }
        }
    }
}
if ($presidente != "") {

    $sql = "SELECT * FROM votos WHERE numero = '$presidente' AND tipoCandidato = '5'";
    $stmt = $conexao->prepare($sql);

    $stmt->execute();

    $rs = $stmt->fetch(PDO::FETCH_OBJ);

    if ($rs) {
        $sql = "SELECT * FROM candidato WHERE numero = '$presidente' AND tipoCandidato = '5'";
        $stmt = $conexao->prepare($sql);

        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $idCandidato = $rs->idCandidato;

                if ($idCandidato != "") {
                    $stmt = $conexao->prepare("UPDATE votos SET qtdVotos = qtdVotos + 1 WHERE idCandidatoVoto='$idCandidato'");
                    $stmt->execute();

                    sleep(5);

                    echo "<script language='javascript' type='text/javascript'>window.location.href='urna.php';</script>";
                    break;
                }
            }
        }
    } else {
        $sql = "SELECT * FROM candidato WHERE numero = '$presidente' AND tipoCandidato = '5'";
        $stmt = $conexao->prepare($sql);

        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $idCandidato = $rs->idCandidato;
                $tipoCandidato = $rs->tipoCandidato;

                if ($idCandidato != "") {
                    $stmt = $conexao->prepare("INSERT INTO votos (idCandidatoVoto, numero, tipoCandidato, qtdVotos) 
                    VALUES ('$idCandidato', '$presidente', '$tipoCandidato', '1')");

                    $stmt->execute();

                    sleep(5);

                    echo "<script language='javascript' type='text/javascript'>window.location.href='urna.php';</script>";
                    break;
                }
            }
        }
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
</head>

<body>
  <div class="fundo"></div>
  <div class="topoUrna"></div>
  <div class="urna">
    <div class="telaInfo">
      <div id="fim">
        <h1>FIM</h1>
      </div>
    </div>
    <div class="telaInfoBorda"></div>
    <div class="etiqueta">
      <img src="img/Coat_of_arms_of_Brazil.svg.png" alt="">
      <p>JUSTIÇA ELEITORAL</p>
    </div>
    <div class="telaBotoes">
      <button id="btn1" class="btn btn1" onclick="pressionaBotao('btn1', listaCandidatos)">1</button>
      <button id="btn2" class="btn btn2" onclick="pressionaBotao('btn2', listaCandidatos)">2</button>
      <button id="btn3" class="btn btn3" onclick="pressionaBotao('btn3', listaCandidatos)">3</button>
      <button id="btn4" class="btn btn4" onclick="pressionaBotao('btn4', listaCandidatos)">4</button>
      <button id="btn5" class="btn btn5" onclick="pressionaBotao('btn5', listaCandidatos)">5</button>
      <button id="btn6" class="btn btn6" onclick="pressionaBotao('btn6', listaCandidatos)">6</button>
      <button id="btn7" class="btn btn7" onclick="pressionaBotao('btn7', listaCandidatos)">7</button>
      <button id="btn8" class="btn btn8" onclick="pressionaBotao('btn8', listaCandidatos)">8</button>
      <button id="btn9" class="btn btn9" onclick="pressionaBotao('btn9', listaCandidatos)">9</button>
      <button id="btn0" class="btn btn0" onclick="pressionaBotao('btn0', listaCandidatos)">0</button>
      
      <div id="form">
        <form action="fim.php" method="POST">
          <input id="depEst" type="hidden" name="depultadoFederal" value="">
          <input id="depFed" type="hidden" name="depultadoEstadual" value="">
          <input id="sen" type="hidden" name="senador" value="">
          <input id="gov" type="hidden" name="governador" value="">
          <input id="pre" type="hidden" name="presidente" value="">
        

        <input type="submit" id="btnBranco" class="btnBranco" onclick="branco()" value="BRANCO">
        <button id="btnCorrige" class="btnCorrige" onclick="corrige()">CORRIGE</button>
        <input type="submit" class="btnConfirma" onclick="confirma()" value="CONFIRMA">
        </form>
      </div>

      <div id="button">
        <button id="btnBranco" class="btnBranco" onclick="branco()">BRANCO</button>
        <button id="btnCorrige" class="btnCorrige" onclick="corrige()">CORRIGE</button>
        <button id="btnConfirma" class="btnConfirma" onclick="confirma()">CONFIRMA</button>
      </div>
    </div>
    
</body>

</html>