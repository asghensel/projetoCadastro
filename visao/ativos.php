<?php 
include_once('../controle/controle_session.php');
include_once('cabecalho.php');
include('inicio.php');
include_once('../controle/funcoes.php');
include_once('../modelo/conexao.php');

?>
<?php
$info_bd = busca_info_bd($conexao,'ativo');
include_once('modal_ativos.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/cadastroAtivo.css">
    <script src="../js/ativos.js"></script>
    <title>Cadastro_ativos</title>
</head>
<body>


<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="modal">Cadastrar Modal</button>

<div class="container">

<table class="table">
<thead>
  <tr>
    <th scope="col">Descrição</th>
    <th scope="col">Quantidade</th>
    <th scope="col">Marca</th>
    <th scope="col">Tipo</th>
    <th scope="col">Observação</th>
    <th scope="col">Ações</th>
    
  </tr>
</thead>
<tbody>
    <?php
    foreach($info_bd as $user){
        ?>
    <tr>
      <td>
        
        <?php echo $user['descricaoAtivo']; ?>
       
      </td>
      <td>
      
      <?php echo $user['quantidadeAtivo']; ?>
      
    </td>
      <td>
  
      <?php echo $user['idMarca']; ?>

    </td>


    <td>
      <?php echo $user['idTipo']; ?>
     
    </td>

    <td>
     
      <?php echo $user['observacaoAtivo']; ?>
      
    </td>

    <td> 

    <?php 

if (['statusAtivo'] === 'S') { 
  
  echo '<i class="fas fa-check-circle" style="color: green;"></i>';
} elseif(['statusAtivo'] === 'N') {
  
  echo '<i class="fas fa-times-circle" style="color: red;"></i>';
}
?>

    <i class="fas fa-check-circle" style="color: green;"></i>
      <a href="movimentacao_ativo.php?idUsuario=<?php echo $user['idAtivo']; ?>">
        <i class="fas fa-pencil-alt" style="color: blue;"></i>
      </a>
    </td>
    </tr>
        <?php

    }
    ?>

  </tbody>
  </table>

</div>
</body>
</html>