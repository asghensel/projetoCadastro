<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);
include('../modelo/conexao.php');
include('controle_session.php');

$descricao = $_POST['descricao'];
$user=$_SESSION['idUser'];
$acao= $_POST['acao'];
$idMarca= $_POST['idMarca'];
$statusMarca= $_POST['status'];
if($acao == 'inserir'){
    $query= "
    insert into marca (
                    descricaoMarca, 
                    statusMarca,
                    dataCadastroMarca,
                    idUsuario
                    )values(
                    '".$descricao."',
                    'S',
                    NOW(),
                    '".$user."'
                    
                                )

        ";

$result = mysqli_query($conexao, $query) or die(false);      
if($result){
    echo "Marca Cadastrada";
}}

if($acao == 'alterar_status'){
    $sql = "
    update marca set statusMarca = '$statusMarca' where idMarca=$idMarca
    
    ";
    $result = mysqli_query($conexao, $sql) or die(false);
    if($result){
        echo "Status Alterado";
        
    }
}


if($acao == 'get_info'){
    $sql = "
        Select 
            descricaoMarca
        From
            marca
        Where
            idMarca = $idMarca    
    ";
    $result = mysqli_query($conexao, $sql) or die(false);
    $marca = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($marca);
    exit();
}

    if($acao == 'update'){
        $sql = "
        update marca set 

        descricaoMarca = '$descricao'

        where idMarca= $idMarca
        ";
        $result = mysqli_query($conexao, $sql) or die(false);
        if($result){
            echo "Informações Alteradas";
            
        }
    }

    if ($acao == 'deletar') {
        $sql = "DELETE FROM marca WHERE idMarca = $idMarca";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
            echo "Marca excluída com sucesso!";
        } else {
            echo "Erro ao excluir a marca: " . mysqli_error($conexao);
        }
    }
?>



