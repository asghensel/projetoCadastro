<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);
include('../modelo/conexao.php');
include('controle_session.php');

$descricao = $_POST['descricao'];
$user=$_SESSION['idUser'];
$acao= $_POST['acao'];
$idTipo= $_POST['idTipo'];
$statusTipo= $_POST['status'];
if($acao == 'inserir'){
    $query= "
    insert into tipo (
                    descricaoTipo, 
                    statusTipo,
                    dataCadastroTipo,
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
    echo "Tipo Cadastrado";
}}

if($acao == 'alterar_status'){
    $sql = "
    update tipo set statusTipo = '$statusTipo' where idTipo=$idTipo
    
    ";
    $result = mysqli_query($conexao, $sql) or die(false);
    if($result){
        echo "Status Alterado";
        
    }
}


if($acao == 'get_info'){
    $sql = "
        Select 
            descricaoTipo
        From
            Tipo
        Where
            idTipo = $idTipo   
    ";
    $result = mysqli_query($conexao, $sql) or die(false);
    $tipo = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($tipo);
    exit();
}

    if($acao == 'update'){
        $sql = "
        update tipo set 

        descricaoTipo = '$descricao'

        where idTipo= $idTipo
        ";
        $result = mysqli_query($conexao, $sql) or die(false);
        if($result){
            echo "Informações Alteradas";
            
        }
    }

    if ($acao == 'deletar') {
        $sql = "DELETE FROM tipo WHERE idTipo = $idTipo";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
            echo "Tipo excluído com sucesso!";
        } else {
            echo "Erro ao excluir o tipo: " . mysqli_error($conexao);
        }
    }
?>