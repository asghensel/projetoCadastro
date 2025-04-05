<?php
include('../modelo/conexao.php');


$nome = $_POST['nome'];
$turma = $_POST['turma'];
$senha = $_POST['senha'];
$usuario = $_POST['usuario'];



$crip = base64_encode($senha);


$query= "
    insert into usuario (
                    nomeUsuario,
                    nicknameUsuario,
                    senhaUsuario,
                    turmaCadastro,
                    dataCadastro,
                    idCargo,
                    admin
                    )values(
                    '".$nome."',
                    '".$usuario."',
                    '".$crip."',
                    '".$turma."',
                    NOW(),
                    '4',
                    'N'
                                )

        ";

$result = mysqli_query($conexao, $query) or die(false);      
if($result){
    echo "<script> alert('usuario cadastrado')
        window.location.href='../visao/login_usuario.php';
    </script>";

}else{
    echo "<script> alert('Falha no Cadastro!')
    window.location.href='../visao/cadastrar_usuario.php';
    </script>";
}

?>