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
  <title>Gerar Codigo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
  <div class="bg"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-3">
        <div class="box" style="height:250px">
          <div class="row" style="margin-top:40px;">
            <div class="col-md-6 offset-3">
              <h4>Codigo:</h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 offset-3">
              <div class="box" style="height:60px; margin-top:0px; border-radius:0px">
                <p><?php echo ($codigo); 
                echo "<script>let codigo = ".$codigo."</script>";
                ?></p>
              </div>
            </div>
          </div>  
          <div class="row">
            <div class="col-md-4 offset-4">
              <a href="validaVoto.php">
                <button style="margin-top:50px" class="btn btn-success btn-block" onclick="alert(codigo)">Voltar</button>
              </a>
            </div>
          </div>     
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>