<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);

include('../modelo/conexao.php');
include('controle_session.php');

$descricao = $_POST['descricao'];
$quantidade_ativo = $_POST['quantidade'];
$observacaoQuant = $_POST['obsQuant'];
$quantidadeMin_ativo = $_POST['quantidadeMin'];
$marca_ativo = $_POST['marca'];
$tipo_ativo = $_POST['tipo'];
$observacao_ativo = $_POST['observacao'];
$user = $_SESSION['idUser'];
$acao = $_POST['acao'];
$idAtivo = $_POST['idAtivo'];
$statusAtivo = $_POST['status'];
$img = $_FILES['img'];

if ($acao == 'inserir') {
    $pasta_base = $_SERVER['DOCUMENT_ROOT'] . '/aulasenac/projetocadastro/uploads/';

    if (!file_exists($pasta_base)) {
        mkdir($pasta_base);
    }
    $data = date("YmdHis");
    $tipoImagem = $img['type'];
    $quebraTipo = explode('/', $tipoImagem);
    $extensao = $quebraTipo[1];

    $result = move_uploaded_file($img['tmp_name'], $pasta_base . $data . '.' . $extensao);
    if ($result == false) {
        echo "Falha ao mover o arquivo";
        exit();
    }

    $urlImagem = 'aulasenac/projetocadastro/uploads/' . $data . '.' . $extensao;

    $query = "
        INSERT INTO ativo (
            descricaoAtivo,
            quantidadeAtivo,
            observacaoQuant,
            quantidadeMinima,
            statusAtivo,
            idMarca,
            idTipo,
            observacaoAtivo,  
            dataCadastroAtivo,
            idUsuario,
            urlImagem
        ) VALUES (
            '" . $descricao . "',
            '" . $quantidade_ativo . "',
            '" . $observacaoQuant . "',
            '" . $quantidadeMin_ativo . "',
            'S',
            '" . $marca_ativo . "',
            '" . $tipo_ativo . "',
            '" . $observacao_ativo . "',
            NOW(),
            '" . $user . "',
            '" . $urlImagem . "'
        )
    ";

    $result = mysqli_query($conexao, $query) or die(false);
    if ($result) {
        echo "Ativo Cadastrado";
    }
}

if ($acao == 'alterar_status') {
    $sql = "
        UPDATE ativo 
        SET statusAtivo = '$statusAtivo' 
        WHERE idAtivo = $idAtivo
    ";
    $result = mysqli_query($conexao, $sql) or die(false);
    if ($result) {
        echo "Status Alterado";
    }
}

if ($acao == 'get_info') {
    $sql = "
        SELECT 
            descricaoAtivo,
            quantidadeAtivo,
            quantidadeMinima,
            observacaoAtivo,
            dataCadastroAtivo,
            urlImagem,
            a.idMarca,
            a.idTipo,
            observacaoQuant,
            (SELECT descricaoMarca FROM marca m WHERE m.idMarca = a.idMarca) AS marca,
            (SELECT descricaoTipo FROM tipo t WHERE t.idTipo = a.idTipo) AS tipo,  
            (SELECT nomeUsuario FROM usuario u WHERE u.idUsuario = a.idUsuario) AS usuario
        FROM
            ativo a 
        WHERE
            idAtivo = $idAtivo    
    ";
    $result = mysqli_query($conexao, $sql) or die(false);
    $ativo = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($ativo);
    exit();
}

if ($acao == 'update') {
    
    $queryUpdate = "UPDATE ativo SET 
                        descricaoAtivo = '$descricao', 
                        quantidadeAtivo = '$quantidade_ativo', 
                        quantidadeMinima = '$quantidadeMin_ativo',
                        idTipo = '$tipo_ativo', 
                        idMarca = '$marca_ativo', 
                        observacaoAtivo = '$observacao_ativo',
                        observacaoQuant = '$observacaoQuant'";

    if ($img && $img['error'] == 0) {
        $pasta_base = $_SERVER['DOCUMENT_ROOT'] . '/aulasenac/projetocadastro/uploads/';
        $data = date("YmdHis");
        $extensao = explode('/', $img['type'])[1];

        // Remove a imagem antiga
        $sql_remove = "SELECT urlImagem FROM ativo WHERE idAtivo = $idAtivo";
        $result_remove = mysqli_query($conexao, $sql_remove) or die(false);
        $info = $result_remove->fetch_all(MYSQLI_ASSOC);
        $img_antiga = $_SERVER['DOCUMENT_ROOT'] . '/' . $info[0]['urlImagem'];
        unlink($img_antiga);

        if (move_uploaded_file($img['tmp_name'], $pasta_base . $data . '.' . $extensao)) {
            $urlImagem = 'aulasenac/projetocadastro/uploads/' . $data . '.' . $extensao;
            $queryUpdate .= ", urlImagem = '$urlImagem'";
        }
    }

    $queryUpdate .= " WHERE idAtivo = $idAtivo";

    if (mysqli_query($conexao, $queryUpdate)) {
        echo "Informações Alteradas";
    }
}

if ($acao == 'deletar') {
    $sql = "DELETE FROM ativo WHERE idAtivo = $idAtivo";
    $result = mysqli_query($conexao, $sql);
    if ($result) {
        echo "Ativo excluído com sucesso!";
    } else {
        echo "Erro ao excluir o ativo: " . mysqli_error($conexao);
    }
}
?>