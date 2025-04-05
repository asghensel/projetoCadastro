<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);
include('../modelo/conexao.php');
include('controle_session.php');
include('classe_opcoes.php');

    $acao= $_POST['acao'];
    $classeOpcoes = new opcoes();

    $descricao = $_POST['descricao'];
    $user=$_SESSION['idUser'];
    $idOpcao= $_POST['idOpcao'];
    $idSuperior= $_POST['idSuperior'];
    $nivel= $_POST['nivel'];
    $url= $_POST['url'];
    $statusOpcao= $_POST['status'];
    $busca= $_POST['buscar'];


if($acao == 'inserir'){
   $result = $classeOpcoes->insert($conexao, $descricao, $user, $url, $nivel,  $idSuperior);
    }
elseif($acao == 'alterar_status'){
    $result = $classeOpcoes->alterar_status($conexao, $idOpcao, $statusOpcao);
}
elseif($acao == 'get_info'){
    $result =  $classeOpcoes->get_info($conexao, $idOpcao);
}
elseif($acao == 'update'){
    $result =  $classeOpcoes->update($conexao, $idOpcao, $descricao, $url, $nivel, $idSuperior);
}
elseif($acao == 'deletar'){
    $result = $classeOpcoes->deletar($conexao, $idOpcao);
}
elseif($acao == 'buscaSuperior'){
    $result = $classeOpcoes->buscaSuperior($conexao, $busca);
}
echo $result;
?>