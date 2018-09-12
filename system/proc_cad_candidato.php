<?php 

include("../system/conexao.php");

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

    $caminho_imagem_candidato = "../processa/fotos/" . $nome_imagem_candidato;

    move_uploaded_file($fotoCandidato["tmp_name"], $caminho_imagem_candidato);

    if ($fotoVice != 'NULL') {
        $nome_imagem_vice = pegaDadosImagemVice();

        $caminho_imagem_vice = "../processa/fotos/" . $nome_imagem;

        move_uploaded_file($foto["tmp_name"], $caminho_imagem_vice);
    }else{
        $caminho_imagem_vice = "NULL";
    }

    try {
        if ($idCandidato != "") {

            $stmt = $conexao->prepare("UPDATE candidato  SET numero=?, nome=?, partido=?, nomeVice=?, fotoCandidato=?, fotoVice=?, tipoCandidato=?  WHERE idCandidato = ?");
            $stmt->bindParam(8, $idCandidato);

            $stmt->bindParam(1, $numero);
            $stmt->bindParam(2, $nome);
            $stmt->bindParam(3, $partido);
            $stmt->bindParam(4, $nomeVice);
            $stmt->bindParam(5, $caminho_imagem_candidato);
            $stmt->bindParam(6, $caminho_imagem_vice);
            $stmt->bindParam(7, $tipoCandidato);
            
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    echo "<script language='javascript' type='text/javascript'>alert('Dados alterados com sucesso!');window.location.href='../cadastro/listar.php';</script>";
                    $idCandidato = null;
                    $especialidade = null;
                    $descricao = null;
                    $caminho_imagem = null;

                } else {
                    echo "Erro ao tentar efetivar cadastro";
                }
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } else {

            $stmt = $conexao->prepare(" INSERT INTO especialidade (nomeEspecialidade, descricao, linkImagem) VALUES ('$especialidade','$descricao','$caminho_imagem')");

            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    echo "<script language='javascript' type='text/javascript'>alert('Dados cadastrados com sucesso!');window.location.href='../cadastro/cadastros.php';</script>";
                } else {
                    echo "<script>alert('Erro ao efetivar o cadastro!')</script>";
                }
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        }



    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }

}

switch ($tipoCandidato) {
    case 'Depultado Estadual':
        $idCandidato = $_POST['idCandidato'];
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
    case 'Depultado Federal':
        $idCandidato = $_POST['idCandidato'];
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
    case 'Senador':
        $idCandidato = $_POST['idCandidato'];
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
    case 'Governador':
        $idCandidato = $_POST['idCandidato'];
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
    case 'Presidente':
        $idCandidato = $_POST['idCandidato'];
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