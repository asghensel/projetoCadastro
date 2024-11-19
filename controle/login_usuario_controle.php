<?php
include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');

$senha = $_POST['senha'];
$usuario = $_POST['usuario'];
$crip= base64_encode($senha);

$sql="Select 
            count(*) as quantidade 
        from 
            usuario         
        where  
            nicknameUsuario	='$usuario'     
            and senhaUsuario='$crip'";


$result = mysqli_query($conexao, $sql) or die(false);
$dados = $result->fetch_assoc();

if($dados['quantidade']>0){
    echo 'login permitido';
}else{
    echo 'senha ou usuario invalido';
}





?>