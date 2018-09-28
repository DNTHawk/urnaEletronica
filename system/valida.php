<?php 

include("../system/conexao.php");

try {
    $conexao = db_connect();
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
}

$cpf = $_POST['cpf'];
$codigo = $_POST['codigo'];

session_start();

$sql = "SELECT * FROM codigo WHERE cpf = '$cpf' AND codigo = '$codigo'";
$stmt = $conexao->prepare($sql);

$stmt->execute();

$rs = $stmt->fetch(PDO::FETCH_OBJ);

if ($rs) {
    $sql = "SELECT * FROM codigo WHERE cpf = '$cpf' AND codigo = '$codigo' AND voto = '0'";
    $stmt = $conexao->prepare($sql);

    $stmt->execute();

    $rs = $stmt->fetch(PDO::FETCH_OBJ);
    if ($rs) {
        $_SESSION['logged_in'] = true;
        echo "<script language='javascript' type='text/javascript'>window.location.href='../view/urna.php';</script>";
    }else{
        $_SESSION['logged_in'] = false;
        echo "<script language='javascript' type='text/javascript'>alert('Eleitor já votou!');window.location.href='validaVoto.php';</script>";
    }
}else{
    $_SESSION['logged_in'] = false;
    echo "<script language='javascript' type='text/javascript'>alert('Codigo Incorreto!');window.location.href='validaVoto.php';</script>";
}
?>