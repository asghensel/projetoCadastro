<?php
include('../modelo/conexao.php');


$nome = $_POST['nome'];
$turma = $_POST['turma'];
$id = $_POST['id'];

$query= "
        update 
            usuario 
        set 
            nomeUsuario = '".$nome."',
            turmaCadastro= '".$turma."'
        where
             idUsuario ='".$id."'   
        ";

        echo $query;
$result = mysqli_query($conexao, $query) or die(false);
if($result){
    echo "<script> alert ('usuario alterado');
    window.location.href ='../visao/listar_usuario.php';
    </script>";
}
else{
    echo "<script> alert ('Falha na alteração');
    window.location.href ='../visao/alterar_usuario.php?id_usuario=$id';
    </script>";
}
?>