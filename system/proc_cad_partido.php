<?php 

include("../system/conexao.php");

$idPartido = $_POST['idPartido'];
$partido = $_POST['partido'];
$descricao = $_POST['descricao'];

try {
    $conexao = db_connect();
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
}



try {
    $stmt = $conexao->prepare(" INSERT INTO partido (partido, descricao) 
    VALUES ('$partido','$descricao')");

    if ($stmt->execute()) {
        if ($stmt->rowCount() > 0) {
            echo "<script language='javascript' type='text/javascript'>alert('Dados cadastrados com sucesso!');window.location.href='../view/cad_partido.php';</script>";
        } else {
            echo "<script>alert('Erro ao efetivar o cadastro!')</script>";
        }
    } else {
        throw new PDOException("Erro: Não foi possível executar a declaração sql");
    }

} catch (PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
}
    

?>