<?php 

include("../system/conexao.php");

try {
    $conexao = db_connect();
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idPartido = (isset($_POST["idPartido"]) && $_POST["idPartido"] != null) ? $_POST["idPartido"] : "";
    $partido = (isset($_POST["partido"]) && $_POST["partido"] != null) ? $_POST["partido"] : "";
    $descricao = (isset($_POST["descricao"]) && $_POST["descricao"] != null) ? $_POST["descricao"] : "";
} else if (!isset($idPartido)) {
    $idPartido = (isset($_GET["idPartido"]) && $_GET["idPartido"] != null) ? $_GET["idPartido"] : "";
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $partido != "") {
    try {
        if ($idPartido != "") {
            $stmt = $conexao->prepare("UPDATE partido  SET partido=?, descricao=? WHERE idPartido = ?");
            $stmt->bindParam(3, $idPartido);
        } else {
            $stmt = $conexao->prepare("INSERT INTO partido (partido, descricao) VALUES (?, ?)");
        }
        $stmt->bindParam(1, $partido);
        $stmt->bindParam(2, $descricao);


        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                echo "<script language='javascript' type='text/javascript'>alert('Dados cadastrado com sucesso!');window.location.href='cad_partido.php';</script>";
                $idPartido = null;
                $partido = null;
                $descricao = null;
            } else {
                echo "Erro ao tentar efetivar cadastro";
            }
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $idPartido != "") {
    try {
        $stmt = $conexao->prepare("SELECT * FROM partido WHERE idPartido = ?");
        $stmt->bindParam(1, $idPartido, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
            $idPartido = $rs->idPartido;
            $partido = $rs->partido;
            $descricao = $rs->descricao;
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
} else {
    $partido = null;
    $descricao = null;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $idPartido != "") {
    try {
        $stmt = $conexao->prepare("DELETE FROM partido WHERE idPartido = ?");
        $stmt->bindParam(1, $idPartido, PDO::PARAM_INT);
        if ($stmt->execute()) {
            echo "<script language='javascript' type='text/javascript'>alert('Registro foi excluido com sucesso!');window.location.href='cad_partido.php';</script>";
            $idPartido = null;
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro partido</title>
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
        <h2 style="text-align:center;">Cadastro de Partido</h2>
      </div>
    </div>
    <form action="?act=save" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="idPartido" require class="form-control" <?php
			if (isset($idPartido) && $idPartido != null || $idPartido != "") {
			  echo "value=\"{$idPartido}\"";
			}
			?> />
      <div class="row" style="margin-top:10px">
        <div id="partido" class="col-md-3">
          <div class="form-group">
            <label for="partido">Sigla Partido:</label>
            <input type="text" name="partido" require class="form-control" <?php
						if (isset($partido) && $partido != null || $partido != "") {
							echo "value=\"{$partido}\"";
						}
						?> />
          </div>
        </div>
        <div id="descricao"class="col-md-3">
          <div class="form-group">
            <label for="descricao">Nome Partido:</label>
            <input type="text" name="descricao" require class="form-control" <?php
						if (isset($descricao) && $descricao != null || $descricao != "") {
							echo "value=\"{$descricao}\"";
						}
						?> />
          </div>
        </div>
      </div>
      <div class="row" style="margin-top: 20px;">
        <div class="col-md-3">
          <input type="submit" value="Enviar" class="btn btn-success btn-block" >
        </div>
      </div>
    </form>
    <div class="row" style="margin-top: 50px">
			<div class="col-md-12">
				<h3>Lista de Partidos</h3>
			</div>
		</div>
    <div class="row" style="margin-top:30px">
      <div class="col-md-12">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Sigla</th>
              <th>Nome Partido</th>
              <th>Acões</th>
            </tr>
          </thead>
          <tbody>
            <?php
            try {
              $stmt = $conexao->prepare("SELECT * FROM partido WHERE partido <> 'BRANCO'");
              if ($stmt->execute()) {
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                  echo "<tr>";
                  echo "<td>" . $rs->partido
                  . "</td><td>" . $rs->descricao
                  . "</td><td><center><a href=\"?act=upd&idPartido=" . $rs->idPartido . "\" class='btn btn-warning btn-sm'><span class=''>Editar</span></a>"
                  . "&nbsp;"
                  . "<a href=\"?act=del&idPartido=" . $rs->idPartido . "\" class='btn btn-danger btn-sm' ><span class=''>Excluir</a></center></td>";
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

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>