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
    <title>Cadastro Candidato</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="../system/proc_cad_partido.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="idPartido" value="">
            <div class="row" style="margin-top:30px">
                <div class="com-md-12">
                    <h2>Cadastro de Partidos</h2>
                </div>
            </div>
            <div class="row" style="margin-top:10px">
                <div id="partido" class="col-md-3">
                    <div class="form-group">
                        <label for="partido">Sigla Partido:</label>
                        <input type="text" name="partido" class="form-control" require>
                    </div>
                </div>
                <div id="descricao"class="col-md-3">
                    <div class="form-group">
                        <label for="descricao">Nome Partido:</label>
                        <input type="text" name="descricao" class="form-control" require>
                    </div>
                </div>
            </div>
            
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-3">
                    <input type="submit" value="Enviar" class="btn btn-success btn-block" >
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>