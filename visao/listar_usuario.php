<?php
include_once('../controle/controle_session.php');
include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');
$sql = "
SELECT 
    idUsuario,  
    nomeUsuario, 
    nicknameUsuario,  
    turmaCadastro,
    idCargo,
    (SELECT descricaoCargo FROM cargos u WHERE u.idCargo = a.idCargo) AS cargo
FROM 
    usuario a
   ";

$Cargos = busca_info_bd($conexao, 'cargos');
$result = mysqli_query($conexao, $sql) or die(false);
$users = $result->fetch_all(MYSQLI_ASSOC);
include('menu.php');

$admin =$_SESSION['admin'];



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/listarusuario.css">
    <script src="../js/listar.js"></script>
    <title>Listar Usuario</title>
</head>

<body>

</body>

</html>

<body>


    <div class="container">

        <table class="table">
            <thead>
                <tr>
                    <th class="ocultar" scope="col">ID</th>
                    <th class="ocultar" scope="col">Nome</th>
                    <th scope="col">Usuário</th>
                    <th class="ocultar" scope="col">Cargo</th>
                    <th class="ocultar" scope="col">Turma</th>

                    <?php if($admin== 'S'){ 
        ?>
                    <th scope="col">Ações</th>
                    <?php
      }
                    ?>


                </tr>
            </thead>
            <tbody>
                <?php
    foreach($users as $user){
        ?>
                <tr>
                    <td class="ocultar">
                        <?php echo $user['idUsuario']; ?>
                    </td>
                    <td class="ocultar">
                        <?php echo $user['nomeUsuario']; ?>
                    </td>
                    <td>
                        <?php echo $user['nicknameUsuario']; ?>
                    </td>
                    <td  class="ocultar">
                        <?php echo $user['cargo'];?>
                    </td>
                    <td class="ocultar">
                        <?php echo $user['turmaCadastro']; ?>
                    </td>
                    <?php if($admin== 'S'){ 
        ?>


                    <td>
                        <div class="acoes">


                            <div class="edit">
                                <a href="alterar_usuario.php?idUsuario=<?php echo $user['idUsuario']?>"><i
                                        class="bi bi-pencil-square"></i></a>
                            </div>

                            <div class="trash">
                                <i class="bi bi-trash" onclick="deletar('<?php echo $user['idUsuario'] ?>')"></i>
                            </div>
                        </div>
                    </td>



                    <?php
      }
?>



                </tr>
                <?php

    }
    ?>

            </tbody>
        </table>

    </div>
    <?php 
include('contrape.php');
?>
</body>

</html>