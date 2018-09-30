<div class="row" style="margin-top:30px">
  <div class="col-md-12">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Numero</th>
          <th>Partido</th>
          <th>Tipo Candidato</th>
          <th>Nome Candidato</th>
          <th>Acões</th>
        </tr>
      </thead>
      <tbody>
        <?php
        try {
            $stmt = $conexao->prepare("SELECT * FROM candidato, partido, tipoCandidato WHERE candidato.partido = partido.idPartido AND candidato.tipoCandidato = tipoCandidato.idTipoCandidato AND tipoCandidato.idTipoCandidato = '2'");
            if ($stmt->execute()) {
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr>";
                    echo "<td>" . $rs->numero
                        . "</td><td>" . $rs->descricao
                        . "</td><td>" . $rs->tipoCandidato
                        . "</td><td>" . $rs->nomeCandidato
                        . "</td><td><center><a href=\"?act=upd&idCandidato=" . $rs->idCandidato . "\" class='btn btn-warning btn-sm'><span class=''>Editar</span></a>"
                        . "&nbsp;"
                        . "<a href=\"?act=del&idCandidato=" . $rs->idCandidato . "\" class='btn btn-danger btn-sm' ><span class=''>Excluir</a></center></td>";
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
  