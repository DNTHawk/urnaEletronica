<?php 

include("../system/conexao.php");

try {
    $conexao = db_connect();
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
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
        <div class="row" style="margin-top:30px;">
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        <a href="urna.php">
                            <img style="width:60%; margin-left:20%" src="img/vote.png" alt="">
                        </a>
                    </div>
                </div>
                <div style="margin-top:10px;" class="row">
                    <div class="col-md-12">
                        <p style="text-align: center;">Urna Eletronica</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        <a href="resultado.php">
                            <img style="width:60%; margin-left:20%" src="img/candidates-ranking-graphic.png" alt="">
                        </a>
                    </div>
                </div>
                <div style="margin-top:10px;" class="row">
                    <div class="col-md-12">
                        <p style="text-align: center;">Resultados</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        <a href="cad_candidato.php">
                            <img style="width:60%; margin-left:20%" src="img/businessman.png" alt="">
                        </a>
                    </div>
                </div>
                <div style="margin-top:10px;" class="row">
                    <div class="col-md-12">
                        <p style="text-align: center;">Cadastro Candidato</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        <a href="cad_partido.php">
                            <img style="width:60%; margin-left:20%" src="img/donkey-americal-political-symbol-of-democrats.png" alt="">
                        </a>
                    </div>
                </div>
                <div style="margin-top:10px;" class="row">
                    <div class="col-md-12">
                        <p style="text-align: center;">Cadastro Partidos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="js/resultados.js"></script>
</body>
</html>