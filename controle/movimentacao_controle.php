<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
include('../modelo/conexao.php');


ini_set('display_errors', 1);
error_reporting(E_ERROR);

$ativo = $_POST['ativo'];
$tipo_mov = $_POST['tipo'];
$quantidadeMov = $_POST['quantidade'];
$origemMov = $_POST['origem'];
$destinoMov = $_POST['destino'];
$descricaoMov = $_POST['descricao'];
$user=$_SESSION['idUser'];
$idMov= $_POST['idMov'];

$sqlTotal = "
    SELECT 
        quantidadeAtivo
    FROM   
        ativo
    where
        idAtivo = $ativo
";

$result = mysqli_query($conexao, $sqlTotal) or die(false);
$ativosTotal = $result->fetch_assoc();

$quantidadeTotal = $ativosTotal['quantidadeAtivo'];


$sqlUso = "
        SELECT
            COALESCE(quantidadeUso,0) as quantidadeUso  
        FROM    
            movimentacao
        WHERE
            idAtivo = $ativo and 
            statusMov = 'S'
";

    $resultUso = mysqli_query($conexao,$sqlUso) or die(false);
    $ativosUso = $resultUso->fetch_assoc();

    $quantidadeUso = $ativosUso['quantidadeUso'];
    





if($tipo_mov == "adicionar"){
    $totalMov = $quantidadeMov + $quantidadeUso;
     if ($totalMov > $quantidadeTotal){
        echo "Não permitido realizar a movimentação. A quantidade de ativos movimentados é maior que a quantidade existente";
        exit();
    }
}else if ($tipo_mov == "remover"){
    if ($quantidadeUso-$quantidadeMov < 0){
       echo "Não permitido realizar a movimentação. A quantidade de ativos movimentados é maior que a quantidade em uso";
        exit();
    }
    $totalMov = $quantidadeUso-$quantidadeMov;
}else{
    if($quantidadeUso-$quantidadeMov < 0){
        echo "Não permitido realizar a Movimentação. Quantidade de ativos que serão realocados é maior que a quantidade em uso!";
        exit();
    }
    $totalMov = $quantidadeUso;
}

$queryUpdate = "
    Update movimentacao
        set
    statusMov = 'N'
        where
    idAtivo = $ativo
";
    $result = mysqli_query($conexao,$queryUpdate) or die(false);

    $query="
        insert into movimentacao (
                idUsuario,
                idAtivo,
                localOrigem,
                localDestino,
                dataMovimentacao,
                descricaoMovimentacao,
                quantidadeUso,
                statusMov,
                tipoMovimentacao,
                quantidadeMov    
            )values(
                '".$user."',
                '".$ativo."',
                '".$origemMov."',
                '".$destinoMov."',
                now(),
                '".$descricaoMov."',
                '".$totalMov."',
                'S',
                '".$tipo_mov."',
                '".$quantidadeMov."'
            )
    ";

$result = mysqli_query($conexao,$query) or die(false);
if($result){
    echo "Sucesso";
}else{
    echo "erro";
}




?>