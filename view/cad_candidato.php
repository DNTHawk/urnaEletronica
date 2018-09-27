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
    $idCandidato = (isset($_POST["idCandidato"]) && $_POST["idCandidato"] != null) ? $_POST["idCandidato"] : "";
    $numero = (isset($_POST["numero"]) && $_POST["numero"] != null) ? $_POST["numero"] : "";
    $nome = (isset($_POST["nome"]) && $_POST["nome"] != null) ? $_POST["nome"] : "";
    $partido = (isset($_POST["partido"]) && $_POST["partido"] != null) ? $_POST["partido"] : "";
    $nomeVice = (isset($_POST["nomeVice"]) && $_POST["nomeVice"] != null) ? $_POST["nomeVice"] : "";
    $tipoCandidato = (isset($_POST["tipoCandidato"]) && $_POST["tipoCandidato"] != null) ? $_POST["tipoCandidato"] : "";
    $fotoCanditado = (isset($_FILES["fotoCanditado"]) && $_FILES["fotoCanditado"] != null) ? $_FILES["fotoCanditado"] : "";
    $fotoVice = (isset($_FILES["fotoVice"]) && $_FILES["fotoVice"] != null) ? $_FILES["fotoVice"] : "";
} else if (!isset($idCandidato)) {
    $idCandidato = (isset($_GET["idCandidato"]) && $_GET["idCandidato"] != null) ? $_GET["idCandidato"] : "";
}

function pegaDadosImagemCandidato()
{
    global $fotoCandidato;

    if (!empty($fotoCandidato["name"])) {

    // Largura máxima em pixels
        $largura = 3150;
    // Altura máxima em pixels
        $altura = 3180;
    // Tamanho máximo do arquivo em bytes
        $tamanho = 1000000000000;

        $error = array();

      // Verifica se o arquivo é uma imagem
        if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $fotoCandidato["type"])) {
            $error[1] = "Isso não é uma imagem.";
        } 

    // Verifica se o tamanho da imagem é maior que o tamanho permitido
        if ($fotoCandidato["size"] > $tamanho) {
            $error[4] = "A imagem deve ter no máximo " . $tamanho . " bytes";
        }

    // Se não houver nenhum erro
        try {
            if (count($error) == 0) {

                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $fotoCandidato["name"], $ext);

          // Gera um nome único para a imagem
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

                return $nome_imagem;

            }
        } catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }


    }
}

function pegaDadosImagemVice()
{
    global $fotoVice;

    if (!empty($fotoVice["name"])) {

    // Largura máxima em pixels
        $largura = 3150;
    // Altura máxima em pixels
        $altura = 3180;
    // Tamanho máximo do arquivo em bytes
        $tamanho = 1000000000000;

        $error = array();

      // Verifica se o arquivo é uma imagem
        if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $fotoVice["type"])) {
            $error[1] = "Isso não é uma imagem.";
        } 

    // Verifica se o tamanho da imagem é maior que o tamanho permitido
        if ($fotoVice["size"] > $tamanho) {
            $error[4] = "A imagem deve ter no máximo " . $tamanho . " bytes";
        }

    // Se não houver nenhum erro
        try {
            if (count($error) == 0) {

                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $fotoVice["name"], $ext);

          // Gera um nome único para a imagem
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

                return $nome_imagem;

            }
        } catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }


    }
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $numero != "") {
    $nome_imagem_candidato = pegaDadosImagemCandidato();

    $caminho_imagem_candidato = "../system/fotos/" . $nome_imagem_candidato;

    move_uploaded_file($fotoCandidato["tmp_name"], $caminho_imagem_candidato);

    //var_dump("Candidato".$caminho_imagem_candidato);

    if ($fotoVice != "NULL") {
        $nome_imagem_vice = pegaDadosImagemVice();

        $caminho_imagem_vice = "../system/fotos/" . $nome_imagem_vice;

        move_uploaded_file($fotoVice["tmp_name"], $caminho_imagem_vice);

       //var_dump("Vice" . $caminho_imagem_vice);
    } else {
        $caminho_imagem_vice = "NULL";
    }

    try {
        if ($idCandidato != "") {
            $stmt = $conexao->prepare("UPDATE candidato  SET numero=?, nome=?, partido=?, nomeVice=?, fotoCandidato=?, fotoVice=?, tipoCandidato=?  WHERE idCandidato = ?");
            $stmt->bindParam(8, $idCandidato);
        } else {
            $stmt = $conexao->prepare("INSERT INTO candidato (numero, nomeCandidato, partido, nomeVice, fotoCandidato, fotoVice, tipoCandidato) VALUES (?, ?, ?, ?, ?, ?, ?)");
        }
        $stmt->bindParam(1, $numero);
        $stmt->bindParam(2, $nome);
        $stmt->bindParam(3, $partido);
        $stmt->bindParam(4, $nomeVice);
        $stmt->bindParam(5, $caminho_imagem_candidato);
        $stmt->bindParam(6, $caminho_imagem_vice);
        $stmt->bindParam(7, $tipoCandidato);


        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                echo "<script language='javascript' type='text/javascript'>alert('Dados cadastrado com sucesso!');window.location.href='cad_candidato.php';</script>";
                $idCandidato = null;
                $numero = null;
                $nome = null;
                $partido = null;
                $nomeVice = null;
                $caminho_imagem_candidato = null;
                $caminho_imagem_vice = null;
                $tipoCandidato = null;
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

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $idCandidato != "") {
    try {
        $stmt = $conexao->prepare("SELECT * FROM candidato, partido, tipoCandidato WHERE candidato.partido = partido.idPartido AND candidato.tipoCandidato = tipoCandidato.idTipoCandidato AND idCandidato = ?");
        $stmt->bindParam(1, $idCandidato, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
            $idCandidato = $rs->idCandidato;
            $numero = $rs->numero;
            $nome = $rs->nome;
            $partido = $rs->descricao;
            $nomeVice = $rs->nomeVice;
            $tipoCandidato = $rs->nomeTipoCandidato;
            $idPartido = $rs->idPartido;
            $idTipoCandidato = $rs->idTipoCandidato;
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
} else {
    $numero = null;
    $nome = null;
    $partido = null;
    $nomeVice = null;
    $tipoCandidato = null;

}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $idCandidato != "") {
    try {
        $stmt = $conexao->prepare("DELETE FROM candidato WHERE idCandidato = ?");
        $stmt->bindParam(1, $idCandidato, PDO::PARAM_INT);
        if ($stmt->execute()) {
            echo "<script language='javascript' type='text/javascript'>alert('Registro foi excluido com sucesso!');window.location.href='cad_candidato.php';</script>";
            $idCandidato = null;
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
    <title>Cadastro Candidato</title>
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
                <h2 style="text-align:center;">Cadastro de Candidato</h2>
            </div>
        </div>
        <form style="margin-top: 30px" action="../system/proc_cad_candidato.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="idCandidato" value="">
            <div class="row" style="margin-top:10px">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tipoCandidato">Tipo Candidatura:</label>
                        <?php
                        $sql = "SELECT * from tipoCandidato order by idTipoCandidato asc";
                        $stm = $conexao->prepare($sql);
                        $stm->execute();
                        $candidatos = $stm->fetchAll(PDO::FETCH_OBJ);
                        ?>
                        <select class="form-control" name="tipoCandidato" id="tipoCandidato" require>
                            <?php 
                            if (isset($idTipoCandidato) && $idTipoCandidato != null || $idTipoCandidato != "") { 
                                ?> <option value="<?= $idTipoCandidato ?>"><?= $tipoCandidato ?></option> <?php
                            } else {
                                ?><option value="">Escolha tipo candidato</option><?php
                            }
                            ?>
                        <?php foreach ($candidatos as $candidato) : ?>
                            <option value=<?= $candidato->idTipoCandidato ?>><?= $candidato->tipoCandidato?></option>
                        <?php endforeach; ?>
                        <span class='msg-erro msg-status'></span>
                        </select>
                    </div>
                </div>
                <div id="numero" class="col-md-3">
                    <div class="form-group">
                        <label for="numero">Numero Candidato:</label>
                        <input type="number" name="numero" class="form-control" require>
                    </div>
                </div>
                <div id="nome"class="col-md-3">
                    <div class="form-group">
                        <label for="nome">Nome Candidato:</label>
                        <input type="text" name="nome" class="form-control" require>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="partido">Partido:</label>
                        <?php
                        $sql = "SELECT * from partido WHERE partido <> 'BRANCO' order by idPartido asc";
                        $stm = $conexao->prepare($sql);
                        $stm->execute();
                        $partidos = $stm->fetchAll(PDO::FETCH_OBJ);
                        ?>
                        <select class="form-control" name="partido" id="partido" require>
                            <?php 
                            if (isset($idPartido) && $idPartido != null || $idPartido != "") { 
                                ?> <option value="<?= $idPartido ?>"><?= $descricao ?></option> <?php
                            } else {
                                ?><option value="">Escolha o partido</option><?php
                            }
                            ?>
                        <?php foreach ($partidos as $partido) : ?>
                            <option value=<?= $partido->idPartido?>><?= $partido->descricao?></option>
                        <?php endforeach; ?>
                        <span class='msg-erro msg-status'></span>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="nomeVice" class="col-md-3">
                    <div class="form-group">
                        <label for="nomeVice">Nome Vice:</label>
                        <input type="text" name="nomeVice" class="form-control" require>
                    </div>
                </div>
                <div id="fotoCandidato" class="col-md-4">
                    <div class="form-group">
                        <label for="fotoCandidato">Foto Candidato:</label>
                        <input type="file" name="fotoCandidato" require>
                    </div>
                </div>
                <div id="fotoVice" class="col-md-4">
                    <div class="form-group">
                        <label for="fotoVice">Foto Vice:</label>
                        <input type="file" name="fotoVice" require>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-3">
                    <input type="submit" value="Enviar" class="btn btn-success btn-block" >
                </div>
            </div>
        </form>
        <?php 
        include("listar_deputadoEstadual.php");
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>