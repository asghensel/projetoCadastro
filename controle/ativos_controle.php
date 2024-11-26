<?php
include('../modelo/conexao.php');

$descricao = $_POST['descricao'];
$quantidade_ativo = $_POST['quantidade'];
$marca_ativo= $_POST['marca'];
$tipo_ativo = $_POST['tipo'];
$observacao_ativo = $_POST['observacao'];

$query= "
    insert into usuario (
                    descricaoAtivo,
                    quantidadeAtivo,
                    idMarca,
                    idTipo
                    observacaoAtivo,  
                    dataCadastro)values(
                    '".$ativo."',
                    '".$quantidade_ativo."',
                    '".$marca_ativo."',
                    '".$tipo_ativo."',
                    '".$observacao_ativo."',
                    NOW()
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