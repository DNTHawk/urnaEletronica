<?php 

$codigo = $_POST['codigo'];

$codigoTeste = "123ABC";

session_start();

// var_dump($codigo);
// exit;

if ($codigo === $codigoTeste) {
    $_SESSION['logged_in'] = true;
    echo "<script language='javascript' type='text/javascript'>window.location.href='../view/urna.php';</script>";
}else{
    $_SESSION['logged_in'] = false;
    echo "<script language='javascript' type='text/javascript'>alert('Codigo Incorreto!');window.location.href='../view/validaVoto.php';</script>";
}

?>