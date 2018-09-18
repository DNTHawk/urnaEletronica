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
        <form action="../system/proc_cad_candidato.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="idCandidato" value="">
            <div class="row" style="margin-top:30px">
                <div class="com-md-12">
                    <h2>Cadastro de Candidato</h2>
                </div>
            </div>
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
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>