<?php 

include("../system/conexao.php");

try {
  $conexao = db_connect();
  $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conexao->exec("set names utf8");
} catch (PDOException $erro) {
  echo "Erro na conexão:" . $erro->getMessage();
}

$sql = "SELECT * FROM candidato, partido WHERE partido.idPartido = candidato.partido";
$query = $conexao->query($sql);

$return = $query->fetchAll(PDO::FETCH_ASSOC);

$returnConvertidoJSON = json_encode($return);

echo "<script>let listaCandidatos = ".$returnConvertidoJSON."</script>";

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Urna Eletronica</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
</head>

<body>
  <div class="fundo"></div>
  <div class="topoUrna"></div>
  <div class="urna">
    <div class="telaInfo">
      <div id="deputadoEstadual">
        <div id="foto1">
        <img class="fotoCandidato" src="" id="fotoDE"/>
          <div class="estiquetaFoto1">
            <p>Deputado Estadual</p>
          </div>
        </div>
        <p class="seuVoto">SEU VOTO PARA</p>
        <h2>Deputado Estadual</h2>
        <div class="group">
          <div id="esq" class="num">Número:</div>
          <div id="dir">
            <div id="num1">
              <p id="dig1"></p>
            </div>
            <div id="num2">
              <p id="dig2"></p>
            </div>
            <div id="num3">
              <p id="dig3"></p>
            </div>
            <div id="num4">
              <p id="dig4"></p>
            </div>
            <div id="num5">
              <p id="dig5"></p>
            </div>
          </div>
        </div>
        <div class="group">
          <div class="nome">Nome:</div>
          <div class="nomeCanditado" id="nomeDE"></div>
        </div>
        <div class="group">
          <div class="partido">Partido:</div>
          <div class="nomePartido" id="partidoDE"></div>
        </div>
        <hr>
        <p class="info">Aperte a Tecla</p>
        <div class="group">
          <div class="corVerde">VERDE</div>
          <div class="msgVerde">para CONFIRMAR este voto</div>
        </div>
        <div class="group">
          <div class="corLaranja">LARANJA</div>
          <div class="msgLaranja">para REINICIAR este voto</div>
        </div>
      </div>
      <div id="deputadoFederal">
        <div id="foto1">
        <img class="fotoCandidato" src="" id="fotoDF">
          <div class="estiquetaFoto1">
            <p>Deputado Federal</p>
          </div>
        </div>
        <p class="seuVoto">SEU VOTO PARA</p>
        <h2>Deputado Federal</h2>
        <div class="group">
          <div id="esq" class="num">Número:</div>
          <div id="dir">
            <div id="num1">
              <p id="df1"></p>
            </div>
            <div id="num2">
              <p id="df2"></p>
            </div>
            <div id="num3">
              <p id="df3"></p>
            </div>
            <div id="num4">
              <p id="df4"></p>
            </div>
          </div>
        </div>
        <div class="group">
          <div class="nome">Nome:</div>
          <div class="nomeCanditado" id="nomeDF"></div>
        </div>
        <div class="group">
          <div class="partido">Partido:</div>
          <div class="nomePartido" id="partidoDF"></div>
        </div>
        <hr>
        <p class="info">Aperte a Tecla</p>
        <div class="group">
          <div class="corVerde">VERDE</div>
          <div class="msgVerde">para CONFIRMAR este voto</div>
        </div>
        <div class="group">
          <div class="corLaranja">LARANJA</div>
          <div class="msgLaranja">para REINICIAR este voto</div>
        </div>
      </div>
      <div id="senador">
        <div id="foto1">
        <img class="fotoCandidato" src="" id="fotoSe">
          <div class="estiquetaFoto1">
            <p>Senador</p>
          </div>
        </div>
        <p class="seuVoto">SEU VOTO PARA</p>
        <h2>Senador</h2>
        <div class="group">
          <div id="esq" class="num">Número:</div>
          <div id="dir">
            <div id="num1">
              <p id="s1"></p>
            </div>
            <div id="num2">
              <p id="s2"></p>
            </div>
            <div id="num3">
              <p id="s3"></p>
            </div>
          </div>
        </div>
        <div class="group">
          <div class="nome">Nome:</div>
          <div class="nomeCanditado" id="nomeSe"></div>
        </div>
        <div class="group">
          <div class="partido">Partido:</div>
          <div class="nomePartido" id="partidoSe"></div>
        </div>
        <hr>
        <p class="info">Aperte a Tecla</p>
        <div class="group">
          <div class="corVerde">VERDE</div>
          <div class="msgVerde">para CONFIRMAR este voto</div>
        </div>
        <div class="group">
          <div class="corLaranja">LARANJA</div>
          <div class="msgLaranja">para REINICIAR este voto</div>
        </div>
      </div>
      <div id="governador">
        <div id="foto1">
        <img class="fotoCandidato" src="" id="fotoGov"/>
          <div class="estiquetaFoto1">
            <p>Governador</p>
          </div>
        </div>
        <div id="foto2">
        <img class="fotoCandidato" src="" id="fotoVicGov"/>
          <div class="estiquetaFoto2">
            <p>Vice-presidente</p>
          </div>
        </div>
        <p class="seuVoto">SEU VOTO PARA</p>
        <h2>Governador</h2>
        <div class="group">
          <div id="esq" class="num">Número:</div>
          <div id="dir">
            <div id="num1">
              <p id="g1"></p>
            </div>
            <div id="num2">
              <p id="g2"></p>
            </div>
          </div>
        </div>
        <div class="group">
          <div class="nome">Nome:</div>
          <div class="nomeCanditado" id="nomeGov"></div>
        </div>
        <div class="group">
          <div class="partido">Partido:</div>
          <div class="nomePartido" id="partidoGov"></div>
        </div>
        <div class="group">
          <div class="vice">Vice:</div>
          <div class="nomeVice" id="nomeVicGov"></div>
        </div>
        <hr>
        <p class="info">Aperte a Tecla</p>
        <div class="group">
          <div class="corVerde">VERDE</div>
          <div class="msgVerde">para CONFIRMAR este voto</div>
        </div>
        <div class="group">
          <div class="corLaranja">LARANJA</div>
          <div class="msgLaranja">para REINICIAR este voto</div>
        </div>
      </div>
      <div id="presidente">
        <div id="foto1">
          <img class="fotoCandidato" src="" id="fotoPre"/>
          <div class="estiquetaFoto1">
            <p>Presidente</p>
          </div>
        </div>
        <div id="foto2">
        <img class="fotoCandidato" src="" id="fotoVicPre"/>
          <div class="estiquetaFoto2">
            <p>Vice-presidente</p>
          </div>
        </div>
        <p class="seuVoto">SEU VOTO PARA</p>
        <h2>Presidente</h2>
        <div class="group">
          <div id="esq" class="num">Número:</div>
          <div id="dir">
            <div id="num1">
              <p id="p1"></p>
            </div>
            <div id="num2">
              <p id="p2"></p>
            </div>
          </div>
        </div>
        <div class="group">
          <div class="nome">Nome:</div>
          <div class="nomeCanditado" id="nomePre"></div>
        </div>
        <div class="group">
          <div class="partido">Partido:</div>
          <div class="nomePartido" id="partidoPre"></div>
        </div>
        <div class="group">
          <div class="vice">Vice:</div>
          <div class="nomeVice" id="nomeVicPre"></div>
        </div>
        <hr>
        <p class="info">Aperte a Tecla</p>
        <div class="group">
          <div class="corVerde">VERDE</div>
          <div class="msgVerde">para CONFIRMAR este voto</div>
        </div>
        <div class="group">
          <div class="corLaranja">LARANJA</div>
          <div class="msgLaranja">para REINICIAR este voto</div>
        </div>
      </div>
      <div id="fim">
        <h1>FIM</h1>
      </div>
    </div>
    <div class="telaInfoBorda"></div>
    <div class="etiqueta">
      <img src="img/Coat_of_arms_of_Brazil.svg.png" alt="">
      <p>JUSTIÇA ELEITORAL</p>
    </div>
    <div class="telaBotoes">
      <button id="btn1" class="btn btn1" onclick="pressionaBotao('btn1', listaCandidatos)">1</button>
      <button id="btn2" class="btn btn2" onclick="pressionaBotao('btn2', listaCandidatos)">2</button>
      <button id="btn3" class="btn btn3" onclick="pressionaBotao('btn3', listaCandidatos)">3</button>
      <button id="btn4" class="btn btn4" onclick="pressionaBotao('btn4', listaCandidatos)">4</button>
      <button id="btn5" class="btn btn5" onclick="pressionaBotao('btn5', listaCandidatos)">5</button>
      <button id="btn6" class="btn btn6" onclick="pressionaBotao('btn6', listaCandidatos)">6</button>
      <button id="btn7" class="btn btn7" onclick="pressionaBotao('btn7', listaCandidatos)">7</button>
      <button id="btn8" class="btn btn8" onclick="pressionaBotao('btn8', listaCandidatos)">8</button>
      <button id="btn9" class="btn btn9" onclick="pressionaBotao('btn9', listaCandidatos)">9</button>
      <button id="btn0" class="btn btn0" onclick="pressionaBotao('btn0', listaCandidatos)">0</button>
      
      <button id="btnBranco" class="btnBranco" onclick="branco()">BRANCO</button>
      <button id="btnCorrige" class="btnCorrige" onclick="corrige()">CORRIGE</button>
      <button id="btnConfirma" class="btnConfirma" onclick="confirma()">CONFIRMA</button>
    </div>

    <audio id="audio">
      <source src="./files/som_urna_confirma.mp3" type="audio/mp3">
    </audio>

    <script src="js/botoes.js"></script>
    <?php
      echo "<script>listaCandidato(listaCandidatos)</script>"
    ?>
</body>

</html>