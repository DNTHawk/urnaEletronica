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
        <img id="imgTitulo" src="img/título-eleitor.jpg" alt="">
        <input id="nomeEleitor" type="text" value="Felipe Rodrigo da Silva" disabled>
        <input id="dataNasc" type="text" value="19/10/1996" disabled>
        <input id="numInscricao" type="text" value="688033403/61" disabled>
        <input id="zona" type="text" value="114" disabled>
        <input id="sessao" type="text" value="0087" disabled>
        <input id="municipio" type="text" value="Sarandi/PR" disabled>
        <input id="dataEmissao" type="text" value="18/05/2014" disabled>
    </div>
</body>
</html>