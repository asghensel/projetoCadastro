<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);


include('../modelo/conexao.php');
include('controle_session.php');



$descricao = $_POST['descricao'];
$quantidade_ativo = $_POST['quantidade'];
$marca_ativo= $_POST['marca'];
$tipo_ativo = $_POST['tipo'];
$observacao_ativo = $_POST['observacao'];
$user=$_SESSION['idUser'];
$acao= $_POST['acao'];
$idAtivo= $_POST['idAtivo'];
$statusAtivo= $_POST['status'];
$img = $_FILES['img'];

if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
    // Defina o diretório de uploads
    $diretorio = "../uploads/";
    $arquivo = $_FILES['img'];
    $nomeArquivo = time() . '_' . basename($arquivo['name']); // Nome único para o arquivo
    $caminhoArquivo = $diretorio . $nomeArquivo;

    // Verifica se o diretório existe, se não, cria
    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0777, true);
    }

    // Move o arquivo para o diretório
    if (move_uploaded_file($arquivo['tmp_name'], $caminhoArquivo)) {
        $imagem_ativo = $caminhoArquivo; // Caminho completo do arquivo
    } else {
        echo "Erro ao fazer upload da imagem.";
        exit();
    }
    var_dump($_FILES);
    exit();
}
if($acao == 'inserir'){
    $query= "
    insert into ativo (
                    descricaoAtivo,
                    quantidadeAtivo,
                    statusAtivo,
                    idMarca,
                    idTipo,
                    observacaoAtivo,  
                    dataCadastroAtivo,
                    idUsuario
                    )values(
                    '".$descricao."',
                    '".$quantidade_ativo."',
                    'S',
                    '".$marca_ativo."',
                    '".$tipo_ativo."',
                    '".$observacao_ativo."',
                    NOW(),
                    '".$user."'
                   
                                )

        ";

$result = mysqli_query($conexao, $query) or die(false);      
if($result){
    echo "Ativo Cadastrado";
}

}
if($acao == 'alterar_status'){
    $sql = "
    update ativo set statusAtivo = '$statusAtivo' where idAtivo=$idAtivo
    
    ";
    $result = mysqli_query($conexao, $sql) or die(false);
    if($result){
        echo "Status Alterado";
        
    }
}


if($acao == 'get_info'){
    $sql = "
        Select 
            descricaoAtivo,
            quantidadeAtivo,
            idMarca,
            idTipo,
            observacaoAtivo
        From
            ativo
        Where
            idAtivo = $idAtivo    
    ";
    $result = mysqli_query($conexao, $sql) or die(false);
    $ativo = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($ativo);
    exit();
}

    if($acao == 'update'){
        $sql = "
        update ativo set 

        descricaoAtivo = '$descricao',
        quantidadeAtivo = '$quantidade_ativo',
        idTipo = '$tipo_ativo',
        idMarca = '$marca_ativo',
        observacaoAtivo = '$observacao_ativo'
        

        where idAtivo=$idAtivo
        
        ";
        $result = mysqli_query($conexao, $sql) or die(false);
        if($result){
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