<?php 

session_start();

include("../system/conexao.php");

try {
    $conexao = db_connect();
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idCodigo = (isset($_POST["idCodigo"]) && $_POST["idCodigo"] != null) ? $_POST["idCodigo"] : "";
    $cpf = (isset($_POST["cpf"]) && $_POST["cpf"] != null) ? $_POST["cpf"] : "";
} else if (!isset($idCodigo)) {
    $idCodigo = (isset($_GET["idCodigo"]) && $_GET["idCodigo"] != null) ? $_GET["idCodigo"] : "";
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $cpf != "") {

    $sql = "SELECT * FROM codigo WHERE cpf = '$cpf'";
    $stmt = $conexao->prepare($sql);

    $stmt->execute();

    $rs = $stmt->fetch(PDO::FETCH_OBJ);

    if ($rs) {

        $sql = "SELECT * FROM codigo WHERE cpf = '$cpf' AND voto = '0'";
        $stmt = $conexao->prepare($sql);

        $stmt->execute();

        $rs = $stmt->fetch(PDO::FETCH_OBJ);

        if ($rs) {
            $sql = "SELECT * FROM codigo WHERE cpf = '$cpf' AND voto = '0'";
            $stmt = $conexao->prepare($sql);

            $stmt->bindParam(':matricula', $matricula);
            $stmt->bindParam(':password', $passwordHash);

            $stmt->execute();

            $codigos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $codigo = $codigos[0];

            $_SESSION['codigo'] = $codigo['codigo'];

            echo "<script language='javascript' type='text/javascript'>window.location.href='codigo.php';</script>";
            
        }else{
            echo "<script language='javascript' type='text/javascript'>alert('Esse CPF já fez o seu voto!');window.location.href='gerarCodigo.php';</script>";
        }

    }else{
        function randString($size)
        {
            //String com valor possíveis do resultado, os caracteres pode ser adicionado ou retirados conforme sua necessidade
            $basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    
            $return = "";
    
            for ($count = 0; $size > $count; $count++) {
                //Gera um caracter aleatorio
                $return .= $basic[rand(0, strlen($basic) - 1)];
            }
    
            return $return;
        }
    
        $codigo = randString(8);
        $voto = 0;
    
        try {
            if ($idCodigo != "") {
                $stmt = $conexao->prepare("UPDATE codigo  SET cpf=?, codigo=?, voto=? WHERE idCodigo = ?");
                $stmt->bindParam(4, $idCodigo);
            } else {
                $stmt = $conexao->prepare("INSERT INTO codigo (cpf, codigo, voto) VALUES (?, ?, ?)");
            }
            $stmt->bindParam(1, $cpf);
            $stmt->bindParam(2, $codigo);
            $stmt->bindParam(3, $voto);
    
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $_SESSION['codigo'] = $codigo;
                    echo "<script language='javascript' type='text/javascript'>window.location.href='codigo.php';</script>";
                    $idCodigo = null;
                    $cpf = null;
                    $codigo = null;
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
}

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
    <script src="js/validaCPF.js"></script>
</head>
<body>
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="box" style="height:250px">
                    <div class="row" style="margin-top:20px;">
                        <div class="col-md-6 offset-3">
                            <h4>Gerar Código para Voto</h4>
                        </div>
                    </div>
                    <form action="?act=save" method="POST">
                        <input type="hidden" name="idCodigo" value="">
                        <div class="row" style="margin-top: 40px">
                            <div class="col-md-6 offset-3">
                                <div class="form-group">
                                    <label for="cfp">CPF</label>
                                    <input type="text" name="cpf" class="form-control" onkeydown="javascript: fMasc( this, mCPF );" maxlength="14" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 offset-4">
                                <input type="submit" class="btn btn-success btn-block" onclick="VerificaCPF();">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>