<?php
$sql = "SELECT * FROM candidato, partido, votos WHERE candidato.partido = partido.idPartido AND votos.idCandidatoVoto = candidato.idCandidato";
$query = $conexao->query($sql);

$return = $query->fetchAll(PDO::FETCH_ASSOC);

$returnConvertidoJSON = json_encode($return);
?>