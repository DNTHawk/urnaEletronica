<?php 

include("../system/conexao.php");

try {
  $conexao = db_connect();
  $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conexao->exec("set names utf8");
} catch (PDOException $erro) {
  echo "Erro na conexão:" . $erro->getMessage();
}
session_start();
$codigo = $_SESSION['codigo'];

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
  <script src="js/validaCPF.js"></script>

  <style>
    .text-label {
      background-color: #226dbc;
      color: #FFF;
      padding: 6px;
      border-radius: 5px;
      border: 1px solid #FFF
    }
  </style>
</head>
<body>
  <div class="bg"></div>
  <div class="container">
    <form id="form" action="../system/valida.php" method="POST">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <label class="text-label">CPF:
            <input type="text" name="cpf" class="form-control" onkeydown="javascript: fMasc( this, mCPF );" maxlength="14" placeholder="Digite seu CPF" required>
          </label>
        </div>
      </div>
      <div class="row" style="margin-top:10px">
        <div class="col-md-6 offset-md-3">
          <label class="text-label">Código:
            <input class='form-control' name='codigo' type='text' id='campoCodigo' require value="<?php echo $codigo ?>">
          </label>
        </div>
      </div>
      <div class="row" style="margin-top:20px;">
        <div class="col-md-6 offset-md-3">
          <input class="btn btn-success btn-block" type="submit" value="Entrar">
        </div>
      </div>
    </form>
  </div>
</body>
</html>