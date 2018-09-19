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
<body style="background-color:#87CEEB">
    <div class="container">
        <form action="../system/valida.php" method="POST">
            <div class="row" style="margin-top:300px;">
                <div class="col-md-2 offset-md-5">
                    <input class="form-control" name="codigo" type="text" require placeholder="Digite seu Codigo">
                </div>
            </div>
            <div class="row" style="margin-top:20px;">
                <div class="col-md-2 offset-md-5">
                    <input class="btn btn-success btn-block" type="submit" value="Entrar">
                </div>
            </div>
        </form>
    </div>
</body>
</html>