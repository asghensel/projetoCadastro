<?php 

include_once('../modelo/conexao.php');
include_once('../controle/funcoes.php');
$usuario_altera = $_GET['idUsuario'];
$info_bd = busca_info_bd($conexao,'usuario','idUsuario',$usuario_altera);

foreach($info_bd as $user){
    $nome = $user['nomeUsuario']; 
    $turma = $user['turmaCadastro']; 
    $id_user = $user['idUsuario'];
    
}
include_once('cabecalho.php');
?>



</head>
<body>
<div class="container">
<form action="../controle/alterar_usuario_controle.php" method="post" id="formulario">
   <input type="hidden" value="<?php echo $id_user ?>" name="id">
  <div class="box">
  <h1 id="title">Alteração Usuário</h1>
      <div class="mb-2">
    <label for="nome" class="form-label">Nome Completo</label>
    <input type="text"  class="form-control" id="nome" placeholder="Altere seu nome aqui" name="nome" required value="<?php echo $nome ?>">
  </div>
  <div class="mb-2">
    <label for="turma" class="form-label">Turma do Usuário</label>
    <input type="text" class="form-control" id="turma" placeholder="Altere sua turma aqui" name="turma" required value="<?php echo $turma ?>">
  </div>
  
  <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>


</div>
</body>
</html>