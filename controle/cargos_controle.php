<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);
include('../modelo/conexao.php');
include('controle_session.php');
include('classe_cargos.php');

    $acao= $_POST['acao'];
    $classeOpcoes = new cargos();

    $descricao = $_POST['descricao'];
    $user=$_SESSION['idUser'];
    $idCargo= $_POST['idCargo'];
    $statusCargo= $_POST['status'];


if($acao == 'inserir'){
    $classeOpcoes->insert($conexao, $descricao, $user );
    }
elseif($acao == 'alterar_status'){
    $classeOpcoes->alterar_status($conexao, $idCargo, $statusCargo);
}
elseif($acao == 'get_info'){
    $classeOpcoes->get_info($conexao, $idCargo);
}
elseif($acao == 'update'){
    $classeOpcoes->update($conexao, $idCargo, $descricao);
}
elseif($acao == 'deletar'){
    $classeOpcoes->deletar($conexao, $idCargo);
}
?>