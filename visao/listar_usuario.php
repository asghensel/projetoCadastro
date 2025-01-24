<?php
include_once('../controle/controle_session.php');
include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');
$info_bd = busca_info_bd($conexao,'usuario');
include_once('inicio.php');
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
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Usuário</th>
      <th scope="col">Turma</th>
     
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
    foreach($info_bd as $user){
        ?>
    <tr>
    <td>
        <?php echo $user['idUsuario']; ?>
       
        
      </td>
      <td>
        
        <?php echo $user['nomeUsuario']; ?>
        
      </td>
      <td>
      
      <?php echo $user['nicknameUsuario']; ?>
     
    </td>
      <td>
     
      <?php echo $user['turmaCadastro']; ?>
      
    </td>
    <?php if($admin== 'S'){ 
        ?>


    <td> 
      <div class="acoes" style="display: flex; justify-content: space-between;">
      

      <div class="edit">
      <a href="alterar_usuario.php?idUsuario=<?php echo $user['idUsuario']?>" ><i class="bi bi-pencil-square"></i></a>
      </div>

      <div class="trash">
      <i class="bi bi-trash" onclick="deletar('<?php echo $user['idUsuario'] ?>')"></i>
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
</body>
</html>