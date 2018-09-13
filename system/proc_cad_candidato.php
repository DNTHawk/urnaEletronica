<?php 

include("../system/conexao.php");

$tipoCandidato = $_POST['tipoCandidato'];
$idCandidato = $_POST['idCandidato'];

try {
    $conexao = db_connect();
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
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

function cadastrar(){
    global $tipoCandidato, $numero, $nome, $partido, $nomeVice, $fotoCandidato, $fotoVice, $conexao;

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
        
        $stmt = $conexao->prepare(" INSERT INTO candidato (numero, nomeCandidato, partido, nomeVice, fotoCandidato, fotoVice, tipoCandidato) 
        VALUES ('$numero','$nome','$partido','$nomeVice','$caminho_imagem_candidato','$caminho_imagem_vice','$tipoCandidato')");

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                echo "<script language='javascript' type='text/javascript'>alert('Dados cadastrados com sucesso!');window.location.href='../view/cad_candidato.php';</script>";
            } else {
                echo "<script>alert('Erro ao efetivar o cadastro!')</script>";
            }
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }

    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }

}

switch ($tipoCandidato) {
    case '1':

        $tipoCandidato = $_POST['tipoCandidato'];
        $numero = $_POST['numero'];
        $nome = $_POST['nome'];
        $partido = $_POST['partido'];
        $nomeVice = "NULL";
        $fotoCandidato = $_FILES['fotoCandidato'];
        $fotoVice = "NULL";

        pegaDadosImagemCandidato();
        cadastrar();

        break;
    case '2':
    
        $tipoCandidato = $_POST['tipoCandidato'];
        $numero = $_POST['numero'];
        $nome = $_POST['nome'];
        $partido = $_POST['partido'];
        $nomeVice = "NULL";
        $fotoCandidato = $_FILES['fotoCandidato'];
        $fotoVice = "NULL";

        pegaDadosImagemCandidato();
        cadastrar();

        break;
    case '3':

        $tipoCandidato = $_POST['tipoCandidato'];
        $numero = $_POST['numero'];
        $nome = $_POST['nome'];
        $partido = $_POST['partido'];
        $nomeVice = "NULL";
        $fotoCandidato = $_FILES['fotoCandidato'];
        $fotoVice = "NULL";

        pegaDadosImagemCandidato();
        cadastrar();

        break;
    case '4':

        $tipoCandidato = $_POST['tipoCandidato'];
        $numero = $_POST['numero'];
        $nome = $_POST['nome'];
        $partido = $_POST['partido'];
        $nomeVice = $_POST['nomeVice'];
        $fotoCandidato = $_FILES['fotoCandidato'];
        $fotoVice = $_FILES['fotoVice'];

        pegaDadosImagemCandidato();
        pegaDadosImagemVice();
        cadastrar();

        break;
    case '5':

        $tipoCandidato = $_POST['tipoCandidato'];
        $numero = $_POST['numero'];
        $nome = $_POST['nome'];
        $partido = $_POST['partido'];
        $nomeVice = $_POST['nomeVice'];
        $fotoCandidato = $_FILES['fotoCandidato'];
        $fotoVice = $_FILES['fotoVice'];

        pegaDadosImagemCandidato();
        pegaDadosImagemVice();
        cadastrar();

        break;
    
    default:
        # code...
        break;
}

?>